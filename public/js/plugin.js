/*
 * bootstrap-tagsinput v0.8.0
 *
 */

(function ($) {
    "use strict";

    var defaultOptions = {
      tagClass: function(item) {
        return 'badge badge-info';
      },
      focusClass: 'focus',
      itemValue: function(item) {
        return item ? item.toString() : item;
      },
      itemText: function(item) {
        return this.itemValue(item);
      },
      itemTitle: function(item) {
        return null;
      },
      freeInput: true,
      addOnBlur: true,
      maxTags: undefined,
      maxChars: undefined,
      confirmKeys: [13, 44],
      delimiter: ',',
      delimiterRegex: null,
      cancelConfirmKeysOnEmpty: false,
      onTagExists: function(item, $tag) {
        $tag.hide().fadeIn();
      },
      trimValue: false,
      allowDuplicates: false,
      triggerChange: true,
      editOnBackspace: false
    };

    /**
     * Constructor function
     */
    function TagsInput(element, options) {
      this.isInit = true;
      this.itemsArray = [];

      this.$element = $(element);
      this.$element.addClass('sr-only');

      this.isSelect = (element.tagName === 'SELECT');
      this.multiple = (this.isSelect && element.hasAttribute('multiple'));
      this.objectItems = options && options.itemValue;
      this.placeholderText = element.hasAttribute('placeholder') ? this.$element.attr('placeholder') : '';
      this.inputSize = Math.max(1, this.placeholderText.length);

      this.$container = $('<div class="bootstrap-tagsinput"></div>');
      this.$input = $('<input type="text" placeholder="' + this.placeholderText + '"/>').appendTo(this.$container);

      this.$element.before(this.$container);

      this.build(options);
      this.isInit = false;
    }

    TagsInput.prototype = {
      constructor: TagsInput,

      /**
       * Adds the given item as a new tag. Pass true to dontPushVal to prevent
       * updating the elements val()
       */
      add: function(item, dontPushVal, options) {
        var self = this;

        if (self.options.maxTags && self.itemsArray.length >= self.options.maxTags)
          return;

        // Ignore falsey values, except false
        if (item !== false && !item)
          return;

        // Trim value
        if (typeof item === "string" && self.options.trimValue) {
          item = $.trim(item);
        }

        // Throw an error when trying to add an object while the itemValue option was not set
        if (typeof item === "object" && !self.objectItems)
          throw("Can't add objects when itemValue option is not set");

        // Ignore strings only containg whitespace
        if (item.toString().match(/^\s*$/))
          return;

        // If SELECT but not multiple, remove current tag
        if (self.isSelect && !self.multiple && self.itemsArray.length > 0)
          self.remove(self.itemsArray[0]);

        if (typeof item === "string" && this.$element[0].tagName === 'INPUT') {
          var delimiter = (self.options.delimiterRegex) ? self.options.delimiterRegex : self.options.delimiter;
          var items = item.split(delimiter);
          if (items.length > 1) {
            for (var i = 0; i < items.length; i++) {
              this.add(items[i], true);
            }

            if (!dontPushVal)
              self.pushVal(self.options.triggerChange);
            return;
          }
        }

        var itemValue = self.options.itemValue(item),
            itemText = self.options.itemText(item),
            tagClass = self.options.tagClass(item),
            itemTitle = self.options.itemTitle(item);

        // Ignore items allready added
        var existing = $.grep(self.itemsArray, function(item) { return self.options.itemValue(item) === itemValue; } )[0];
        if (existing && !self.options.allowDuplicates) {
          // Invoke onTagExists
          if (self.options.onTagExists) {
            var $existingTag = $(".badge", self.$container).filter(function() { return $(this).data("item") === existing; });
            self.options.onTagExists(item, $existingTag);
          }
          return;
        }

        // if length greater than limit
        if (self.items().toString().length + item.length + 1 > self.options.maxInputLength)
          return;

        // raise beforeItemAdd arg
        var beforeItemAddEvent = $.Event('beforeItemAdd', { item: item, cancel: false, options: options});
        self.$element.trigger(beforeItemAddEvent);
        if (beforeItemAddEvent.cancel)
          return;

        // register item in internal array and map
        self.itemsArray.push(item);

        // add a tag element

        var $tag = $('<span class="' + htmlEncode(tagClass) + (itemTitle !== null ? ('" title="' + itemTitle) : '') + '">' + htmlEncode(itemText) + '<span data-role="remove"></span></span>');
        $tag.data('item', item);
        self.findInputWrapper().before($tag);

        // Check to see if the tag exists in its raw or uri-encoded form
        var optionExists = (
          $('option[value="' + encodeURIComponent(itemValue).replace(/"/g, '\\"') + '"]', self.$element).length ||
          $('option[value="' + htmlEncode(itemValue).replace(/"/g, '\\"') + '"]', self.$element).length
        );

        // add <option /> if item represents a value not present in one of the <select />'s options
        if (self.isSelect && !optionExists) {
          var $option = $('<option selected>' + htmlEncode(itemText) + '</option>');
          $option.data('item', item);
          $option.attr('value', itemValue);
          self.$element.append($option);
        }

        if (!dontPushVal)
          self.pushVal(self.options.triggerChange);

        // Add class when reached maxTags
        if (self.options.maxTags === self.itemsArray.length || self.items().toString().length === self.options.maxInputLength)
          self.$container.addClass('bootstrap-tagsinput-max');

        // If using typeahead, once the tag has been added, clear the typeahead value so it does not stick around in the input.
        if ($('.typeahead, .twitter-typeahead', self.$container).length) {
          self.$input.typeahead('val', '');
        }

        if (this.isInit) {
          self.$element.trigger($.Event('itemAddedOnInit', { item: item, options: options }));
        } else {
          self.$element.trigger($.Event('itemAdded', { item: item, options: options }));
        }
      },

      /**
       * Removes the given item. Pass true to dontPushVal to prevent updating the
       * elements val()
       */
      remove: function(item, dontPushVal, options) {
        var self = this;

        if (self.objectItems) {
          if (typeof item === "object")
            item = $.grep(self.itemsArray, function(other) { return self.options.itemValue(other) ==  self.options.itemValue(item); } );
          else
            item = $.grep(self.itemsArray, function(other) { return self.options.itemValue(other) ==  item; } );

          item = item[item.length-1];
        }

        if (item) {
          var beforeItemRemoveEvent = $.Event('beforeItemRemove', { item: item, cancel: false, options: options });
          self.$element.trigger(beforeItemRemoveEvent);
          if (beforeItemRemoveEvent.cancel)
            return;

          $('.badge', self.$container).filter(function() { return $(this).data('item') === item; }).remove();
          $('option', self.$element).filter(function() { return $(this).data('item') === item; }).remove();
          if($.inArray(item, self.itemsArray) !== -1)
            self.itemsArray.splice($.inArray(item, self.itemsArray), 1);
        }

        if (!dontPushVal)
          self.pushVal(self.options.triggerChange);

        // Remove class when reached maxTags
        if (self.options.maxTags > self.itemsArray.length)
          self.$container.removeClass('bootstrap-tagsinput-max');

        self.$element.trigger($.Event('itemRemoved',  { item: item, options: options }));
      },

      /**
       * Removes all items
       */
      removeAll: function() {
        var self = this;

        $('.badge', self.$container).remove();
        $('option', self.$element).remove();

        while(self.itemsArray.length > 0)
          self.itemsArray.pop();

        self.pushVal(self.options.triggerChange);
      },

      /**
       * Refreshes the tags so they match the text/value of their corresponding
       * item.
       */
      refresh: function() {
        var self = this;
        $('.badge', self.$container).each(function() {
          var $tag = $(this),
              item = $tag.data('item'),
              itemValue = self.options.itemValue(item),
              itemText = self.options.itemText(item),
              tagClass = self.options.tagClass(item);

            // Update tag's class and inner text
            $tag.attr('class', null);
            $tag.addClass('badge ' + htmlEncode(tagClass));
            $tag.contents().filter(function() {
              return this.nodeType == 3;
            })[0].nodeValue = htmlEncode(itemText);

            if (self.isSelect) {
              var option = $('option', self.$element).filter(function() { return $(this).data('item') === item; });
              option.attr('value', itemValue);
            }
        });
      },

      /**
       * Returns the items added as tags
       */
      items: function() {
        return this.itemsArray;
      },

      /**
       * Assembly value by retrieving the value of each item, and set it on the
       * element.
       */
      pushVal: function() {
        var self = this,
            val = $.map(self.items(), function(item) {
              return self.options.itemValue(item).toString();
            });

        self.$element.val( val.join(self.options.delimiter) );

        if (self.options.triggerChange)
          self.$element.trigger('change');
      },

      /**
       * Initializes the tags input behaviour on the element
       */
      build: function(options) {
        var self = this;

        self.options = $.extend({}, defaultOptions, options);
        // When itemValue is set, freeInput should always be false
        if (self.objectItems)
          self.options.freeInput = false;

        makeOptionItemFunction(self.options, 'itemValue');
        makeOptionItemFunction(self.options, 'itemText');
        makeOptionFunction(self.options, 'tagClass');

        // Typeahead Bootstrap version 2.3.2
        if (self.options.typeahead) {
          var typeahead = self.options.typeahead || {};

          makeOptionFunction(typeahead, 'source');

          self.$input.typeahead($.extend({}, typeahead, {
            source: function (query, process) {
              function processItems(items) {
                var texts = [];

                for (var i = 0; i < items.length; i++) {
                  var text = self.options.itemText(items[i]);
                  map[text] = items[i];
                  texts.push(text);
                }
                process(texts);
              }

              this.map = {};
              var map = this.map,
                  data = typeahead.source(query);

              if ($.isFunction(data.success)) {
                // support for Angular callbacks
                data.success(processItems);
              } else if ($.isFunction(data.then)) {
                // support for Angular promises
                data.then(processItems);
              } else {
                // support for functions and jquery promises
                $.when(data)
                 .then(processItems);
              }
            },
            updater: function (text) {
              self.add(this.map[text]);
              return this.map[text];
            },
            matcher: function (text) {
              return (text.toLowerCase().indexOf(this.query.trim().toLowerCase()) !== -1);
            },
            sorter: function (texts) {
              return texts.sort();
            },
            highlighter: function (text) {
              var regex = new RegExp( '(' + this.query + ')', 'gi' );
              return text.replace( regex, "<strong>$1</strong>" );
            }
          }));
        }

        // typeahead.js
        if (self.options.typeaheadjs) {
          // Determine if main configurations were passed or simply a dataset
          var typeaheadjs = self.options.typeaheadjs;
          if (!$.isArray(typeaheadjs)) {
              typeaheadjs = [null, typeaheadjs];
          }

          $.fn.typeahead.apply(self.$input, typeaheadjs).on('typeahead:selected', $.proxy(function (obj, datum, name) {
            var index = 0;
            typeaheadjs.some(function(dataset, _index) {
              if (dataset.name === name) {
                index = _index;
                return true;
              }
              return false;
            });

            // @TODO Dep: https://github.com/corejavascript/typeahead.js/issues/89
            if (typeaheadjs[index].valueKey) {
              self.add(datum[typeaheadjs[index].valueKey]);
            } else {
              self.add(datum);
            }

            self.$input.typeahead('val', '');
          }, self));
        }

        self.$container.on('click', $.proxy(function(event) {
          if (! self.$element.attr('disabled')) {
            self.$input.removeAttr('disabled');
          }
          self.$input.focus();
        }, self));

          if (self.options.addOnBlur && self.options.freeInput) {
            self.$input.on('focusout', $.proxy(function(event) {
                // HACK: only process on focusout when no typeahead opened, to
                //       avoid adding the typeahead text as tag
                if ($('.twitter-typeahead', self.$container).length === 0) {
                  // self.add(self.$input.val());
                  self.$input.val('');
                }
            }, self));
          }

        // Toggle the 'focus' css class on the container when it has focus
        self.$container.on({
          focusin: function() {
            self.$container.addClass(self.options.focusClass);
          },
          focusout: function() {
            self.$container.removeClass(self.options.focusClass);
          },
        });

        self.$container.on('keydown', 'input', $.proxy(function(event) {
          var $input = $(event.target),
              $inputWrapper = self.findInputWrapper();

          if (self.$element.attr('disabled')) {
            self.$input.attr('disabled', 'disabled');
            return;
          }

          switch (event.which) {
            // BACKSPACE
            case 8:
              if (doGetCaretPosition($input[0]) === 0) {
                var prev = $inputWrapper.prev();
                if (prev.length) {
                  if (self.options.editOnBackspace === true) {
                    $input.val(prev.data('item'));
                  }
                  self.remove(prev.data('item'));
                }
              }
              break;

            // DELETE
            case 46:
              if (doGetCaretPosition($input[0]) === 0) {
                var next = $inputWrapper.next();
                if (next.length) {
                  self.remove(next.data('item'));
                }
              }
              break;

            // LEFT ARROW
            case 37:
              // Try to move the input before the previous tag
              var $prevTag = $inputWrapper.prev();
              if ($input.val().length === 0 && $prevTag[0]) {
                $prevTag.before($inputWrapper);
                $input.focus();
              }
              break;
            // RIGHT ARROW
            case 39:
              // Try to move the input after the next tag
              var $nextTag = $inputWrapper.next();
              if ($input.val().length === 0 && $nextTag[0]) {
                $nextTag.after($inputWrapper);
                $input.focus();
              }
              break;
           default:
               // ignore
           }

          // Reset internal input's size
          var textLength = $input.val().length,
              wordSpace = Math.ceil(textLength / 5),
              size = textLength + wordSpace + 1;
          $input.attr('size', Math.max(this.inputSize, size));
        }, self));

        self.$container.on('keypress', 'input', $.proxy(function(event) {
           var $input = $(event.target);

           if (self.$element.attr('disabled')) {
              self.$input.attr('disabled', 'disabled');
              return;
           }

           var text = $input.val(),
           maxLengthReached = self.options.maxChars && text.length >= self.options.maxChars;
           if (self.options.freeInput && (keyCombinationInList(event, self.options.confirmKeys) || maxLengthReached)) {
              // Only attempt to add a tag if there is data in the field
              if (text.length !== 0) {
                 self.add(maxLengthReached ? text.substr(0, self.options.maxChars) : text);
                 $input.val('');
              }

              // If the field is empty, let the event triggered fire as usual
              if (self.options.cancelConfirmKeysOnEmpty === false) {
                  event.preventDefault();
              }
           }

           // Reset internal input's size
           var textLength = $input.val().length,
              wordSpace = Math.ceil(textLength / 5),
              size = textLength + wordSpace + 1;
           $input.attr('size', Math.max(this.inputSize, size));
        }, self));

        // Remove icon clicked
        self.$container.on('click', '[data-role=remove]', $.proxy(function(event) {
          if (self.$element.attr('disabled')) {
            return;
          }
          self.remove($(event.target).closest('.badge').data('item'));
        }, self));

        // Only add existing value as tags when using strings as tags
        if (self.options.itemValue === defaultOptions.itemValue) {
          if (self.$element[0].tagName === 'INPUT') {
              self.add(self.$element.val());
          } else {
            $('option', self.$element).each(function() {
              self.add($(this).attr('value'), true);
            });
          }
        }
      },

      /**
       * Removes all tagsinput behaviour and unregsiter all event handlers
       */
      destroy: function() {
        var self = this;

        // Unbind events
        self.$container.off('keypress', 'input');
        self.$container.off('click', '[role=remove]');

        self.$container.remove();
        self.$element.removeData('tagsinput');
        self.$element.show();
      },

      /**
       * Sets focus on the tagsinput
       */
      focus: function() {
        this.$input.focus();
      },

      /**
       * Returns the internal input element
       */
      input: function() {
        return this.$input;
      },

      /**
       * Returns the element which is wrapped around the internal input. This
       * is normally the $container, but typeahead.js moves the $input element.
       */
      findInputWrapper: function() {
        var elt = this.$input[0],
            container = this.$container[0];
        while(elt && elt.parentNode !== container)
          elt = elt.parentNode;

        return $(elt);
      }
    };

    /**
     * Register JQuery plugin
     */
    $.fn.tagsinput = function(arg1, arg2, arg3) {
      var results = [];

      this.each(function() {
        var tagsinput = $(this).data('tagsinput');
        // Initialize a new tags input
        if (!tagsinput) {
            tagsinput = new TagsInput(this, arg1);
            $(this).data('tagsinput', tagsinput);
            results.push(tagsinput);

            if (this.tagName === 'SELECT') {
                $('option', $(this)).attr('selected', 'selected');
            }

            // Init tags from $(this).val()
            $(this).val($(this).val());
        } else if (!arg1 && !arg2) {
            // tagsinput already exists
            // no function, trying to init
            results.push(tagsinput);
        } else if(tagsinput[arg1] !== undefined) {
            // Invoke function on existing tags input
              if(tagsinput[arg1].length === 3 && arg3 !== undefined){
                 var retVal = tagsinput[arg1](arg2, null, arg3);
              }else{
                 var retVal = tagsinput[arg1](arg2);
              }
            if (retVal !== undefined)
                results.push(retVal);
        }
      });

      if ( typeof arg1 == 'string') {
        // Return the results from the invoked function calls
        return results.length > 1 ? results : results[0];
      } else {
        return results;
      }
    };

    $.fn.tagsinput.Constructor = TagsInput;

    /**
     * Most options support both a string or number as well as a function as
     * option value. This function makes sure that the option with the given
     * key in the given options is wrapped in a function
     */
    function makeOptionItemFunction(options, key) {
      if (typeof options[key] !== 'function') {
        var propertyName = options[key];
        options[key] = function(item) { return item[propertyName]; };
      }
    }
    function makeOptionFunction(options, key) {
      if (typeof options[key] !== 'function') {
        var value = options[key];
        options[key] = function() { return value; };
      }
    }
    /**
     * HtmlEncodes the given value
     */
    var htmlEncodeContainer = $('<div />');
    function htmlEncode(value) {
      if (value) {
        return htmlEncodeContainer.text(value).html();
      } else {
        return '';
      }
    }

    /**
     * Returns the position of the caret in the given input field
     * http://flightschool.acylt.com/devnotes/caret-position-woes/
     */
    function doGetCaretPosition(oField) {
      var iCaretPos = 0;
      if (document.selection) {
        oField.focus ();
        var oSel = document.selection.createRange();
        oSel.moveStart ('character', -oField.value.length);
        iCaretPos = oSel.text.length;
      } else if (oField.selectionStart || oField.selectionStart == '0') {
        iCaretPos = oField.selectionStart;
      }
      return (iCaretPos);
    }

    /**
      * Returns boolean indicates whether user has pressed an expected key combination.
      * @param object keyPressEvent: JavaScript event object, refer
      *     http://www.w3.org/TR/2003/WD-DOM-Level-3-Events-20030331/ecma-script-binding.html
      * @param object lookupList: expected key combinations, as in:
      *     [13, {which: 188, shiftKey: true}]
      */
    function keyCombinationInList(keyPressEvent, lookupList) {
        var found = false;
        $.each(lookupList, function (index, keyCombination) {
            if (typeof (keyCombination) === 'number' && keyPressEvent.which === keyCombination) {
                found = true;
                return false;
            }

            if (keyPressEvent.which === keyCombination.which) {
                var alt = !keyCombination.hasOwnProperty('altKey') || keyPressEvent.altKey === keyCombination.altKey,
                    shift = !keyCombination.hasOwnProperty('shiftKey') || keyPressEvent.shiftKey === keyCombination.shiftKey,
                    ctrl = !keyCombination.hasOwnProperty('ctrlKey') || keyPressEvent.ctrlKey === keyCombination.ctrlKey;
                if (alt && shift && ctrl) {
                    found = true;
                    return false;
                }
            }
        });

        return found;
    }

    /**
     * Initialize tagsinput behaviour on inputs and selects which have
     * data-role=tagsinput
     */
    $(function() {
      $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
    });
  })(window.jQuery);

/*  jQuery Nice Select - v1.1.0
https://github.com/hernansartorio/jquery-nice-select
Made by Hernán Sartorio  */

(function($) {
    $.fn.niceSelect = function(method) {
        // Methods
        if (typeof method == "string") {
            if (method == "update") {
                this.each(function() {
                    var $select = $(this);
                    var $dropdown = $(this).next(".nice-select");
                    var open = $dropdown.hasClass("open");

                    if ($dropdown.length) {
                        $dropdown.remove();
                        create_nice_select($select);

                        if (open) {
                            $select.next().trigger("click");
                        }
                    }
                });
            } else if (method == "destroy") {
                this.each(function() {
                    var $select = $(this);
                    var $dropdown = $(this).next(".nice-select");

                    if ($dropdown.length) {
                        $dropdown.remove();
                        $select.css("display", "");
                    }
                });
                if ($(".nice-select").length == 0) {
                    $(document).off(".nice_select");
                }
            } else {
                console.log('Method "' + method + '" does not exist.');
            }
            return this;
        }

        // Hide native select
        this.hide();

        // Create custom markup
        this.each(function() {
            var $select = $(this);

            if (!$select.next().hasClass("nice-select")) {
                create_nice_select($select);
            }
        });

        function create_nice_select($select) {
            $select.after(
                $("<div></div>")
                    .addClass("nice-select")
                    .addClass($select.attr("class") || "")
                    .addClass($select.attr("disabled") ? "disabled" : "")
                    .addClass($select.attr("multiple") ? "has-multiple" : "")
                    .attr("tabindex", $select.attr("disabled") ? null : "0")
                    .html(
                        $select.attr("multiple")
                            ? '<span class="multiple-options"></span><div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="'+trans('js.Search')+'..."/></div><ul class="list"></ul>'
                            : '<span class="current"></span><div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="'+trans('js.Search')+'..."/></div><ul class="list"></ul>'
                    )
            );

            var $dropdown = $select.next();
            var $options = $select.find("option");
            if ($select.attr("multiple")) {
                var $selected = $select.find("option:selected");
                var $selected_html = "";
                $selected.each(function() {
                    $selected_option = $(this);
                    $selected_text =
                        $selected_option.data("display") ||
                        $selected_option.text();
                    $selected_html +=
                        '<span class="current">' + $selected_text + "</span>";
                });
                $select_placeholder =
                    $select.data("placeholder") || $select.attr("placeholder");
                $select_placeholder =
                    $select_placeholder == "" ? "Select" : $select_placeholder;
                $selected_html =
                    $selected_html == "" ? $select_placeholder : $selected_html;
                $dropdown.find(".multiple-options").html($selected_html);
            } else {
                var $selected = $select.find("option:selected");
                $dropdown
                    .find(".current")
                    .html($selected.data("display") || $selected.text());
            }

            $options.each(function(i) {
                var $option = $(this);
                var display = $option.data("display");

                $dropdown.find("ul").append(
                    $("<li></li>")
                        .attr("data-value", $option.val())
                        .attr("data-display", display || null)
                        .addClass(
                            "option" +
                                ($option.is(":selected") ? " selected" : "") +
                                ($option.is(":disabled") ? " disabled" : "")
                        )
                        .html($option.text())
                );
            });
        }

        /* Event listeners */

        // Unbind existing events in case that the plugin has been initialized before
        $(document).off(".nice_select");

        // Open/close
        $(document).on("click.nice_select", ".nice-select", function(event) {
            var $dropdown = $(this);

            $(".nice-select")
                .not($dropdown)
                .removeClass("open");
            $dropdown.toggleClass("open");

            if ($dropdown.hasClass("open")) {
                $dropdown.find(".option");
                $dropdown.find(".nice-select-search").val("");
                $dropdown.find(".nice-select-search").focus();
                $dropdown.find(".focus").removeClass("focus");
                $dropdown.find(".selected").addClass("focus");
                $dropdown.find("ul li").show();
            } else {
                $dropdown.focus();
            }
        });

        $(document).on("click", ".nice-select-search-box", function(event) {
            event.stopPropagation();
            return false;
        });
        $(document).on("keyup.nice-select-search", ".nice-select", function() {
            var $self = $(this);
            var $text = $self.find(".nice-select-search").val();
            var $options = $self.find("ul li");
            if ($text == "") $options.show();
            else if ($self.hasClass("open")) {
                $text = $text.toLowerCase();
                var $matchReg = new RegExp($text);
                if (0 < $options.length) {
                    $options.each(function() {
                        var $this = $(this);
                        var $optionText = $this.text().toLowerCase();
                        var $matchCheck = $matchReg.test($optionText);
                        $matchCheck ? $this.show() : $this.hide();
                    });
                } else {
                    $options.show();
                }
            }
            $self.find(".option"),
                $self.find(".focus").removeClass("focus"),
                $self.find(".selected").addClass("focus");
        });

        // Close when clicking outside
        $(document).on("click.nice_select", function(event) {
            if ($(event.target).closest(".nice-select").length === 0) {
                $(".nice-select")
                    .removeClass("open")
                    .find(".option");
            }
        });

        // Option click
        $(document).on(
            "click.nice_select",
            ".nice-select .option:not(.disabled)",
            function(event) {
                var $option = $(this);
                var $dropdown = $option.closest(".nice-select");
                if ($dropdown.hasClass("has-multiple")) {
                    if ($option.hasClass("selected")) {
                        $option.removeClass("selected");
                    } else {
                        $option.addClass("selected");
                    }
                    $selected_html = "";
                    $selected_values = [];
                    $dropdown.find(".selected").each(function() {
                        $selected_option = $(this);
                        var text =
                            $selected_option.data("display") ||
                            $selected_option.text();
                        $selected_html +=
                            '<span class="current">' + text + "</span>";
                        $selected_values.push($selected_option.data("value"));
                    });
                    $select_placeholder =
                        $dropdown.prev("select").data("placeholder") ||
                        $dropdown.prev("select").attr("placeholder");
                    $select_placeholder =
                        $select_placeholder == ""
                            ? "Select"
                            : $select_placeholder;
                    $selected_html =
                        $selected_html == ""
                            ? $select_placeholder
                            : $selected_html;
                    $dropdown.find(".multiple-options").html($selected_html);
                    $dropdown
                        .prev("select")
                        .val($selected_values)
                        .trigger("change");
                } else {
                    $dropdown.find(".selected").removeClass("selected");
                    $option.addClass("selected");
                    var text = $option.data("display") || $option.text();
                    $dropdown.find(".current").text(text);
                    $dropdown
                        .prev("select")
                        .val($option.data("value"))
                        .trigger("change");
                }
            }
        );

        // Keyboard events
        $(document).on("keydown.nice_select", ".nice-select", function(event) {
            var $dropdown = $(this);
            var $focused_option = $(
                $dropdown.find(".focus") ||
                    $dropdown.find(".list .option.selected")
            );

            // Space or Enter
            if (event.keyCode == 32 || event.keyCode == 13) {
                if ($dropdown.hasClass("open")) {
                    $focused_option.trigger("click");
                } else {
                    $dropdown.trigger("click");
                }
                return false;
                // Down
            } else if (event.keyCode == 40) {
                if (!$dropdown.hasClass("open")) {
                    $dropdown.trigger("click");
                } else {
                    var $next = $focused_option
                        .nextAll(".option:not(.disabled)")
                        .first();
                    if ($next.length > 0) {
                        $dropdown.find(".focus").removeClass("focus");
                        $next.addClass("focus");
                    }
                }
                return false;
                // Up
            } else if (event.keyCode == 38) {
                if (!$dropdown.hasClass("open")) {
                    $dropdown.trigger("click");
                } else {
                    var $prev = $focused_option
                        .prevAll(".option:not(.disabled)")
                        .first();
                    if ($prev.length > 0) {
                        $dropdown.find(".focus").removeClass("focus");
                        $prev.addClass("focus");
                    }
                }
                return false;
                // Esc
            } else if (event.keyCode == 27) {
                if ($dropdown.hasClass("open")) {
                    $dropdown.trigger("click");
                }
                // Tab
            } else if (event.keyCode == 9) {
                if ($dropdown.hasClass("open")) {
                    return false;
                }
            }
        });

        // Detect CSS pointer-events support, for IE <= 10. From Modernizr.
        var style = document.createElement("a").style;
        style.cssText = "pointer-events:auto";
        if (style.pointerEvents !== "auto") {
            $("html").addClass("no-csspointerevents");
        }

        return this;
    };
})(jQuery);

const APP_URL = $('meta[name="url"]').attr('content');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('select').niceSelect();
// metisMenu
var metismenu = $("#sidebar_menu");
if (metismenu.length) {
    metismenu.metisMenu();
}

$(".open_miniSide").click(function() {
    $(".sidebar").toggleClass("mini_sidebar");
    $("#main-content").toggleClass("mini_main_content");
});


$(document).click(function(event) {
    if (!$(event.target).closest(".sidebar,.sidebar_icon  ").length) {
        $("body").find(".sidebar").removeClass("active");
    }
});

function slideToggle(clickBtn, toggleDiv) {
    clickBtn.on('click', function() {
        toggleDiv.stop().slideToggle('slow');
    });
}


$(function() {
    $('#theme_nav li label').on('click', function() {
		$('#'+$(this).data('id')).show().siblings('div.Settings_option').hide();
    });
    $('#sms_setting li label').on('click', function() {
		$('#'+$(this).data('id')).show().siblings('div.sms_ption').hide();
    });
});



/*-------------------------------------------------------------------------------
        Start Upload file and chane placeholder name
    -------------------------------------------------------------------------------*/
var fileInput = document.getElementById('browseFile');
if (fileInput) {
    fileInput.addEventListener('change', showFileName);

    function showFileName(event) {
        var fileInput = event.srcElement;
        var fileName = fileInput.files[0].name;
        document.getElementById('placeholderInput').placeholder = fileName;
    }
}

if ($('.multipleSelect').length) {
    $('.multipleSelect').fastselect();
}

/*-------------------------------------------------------------------------------
        End Upload file and chane placeholder name
    -------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------
        Start Check Input is empty
    -------------------------------------------------------------------------------*/
$('.input-effect input').each(function() {
    if ($(this).val().length > 0) {
        $(this).addClass('read-only-input');
    } else {
        $(this).removeClass('read-only-input');
    }

    $(this).on('keyup', function() {
        if ($(this).val().length > 0) {
            $(this).siblings('.invalid-feedback').fadeOut('slow');
        } else {
            $(this).siblings('.invalid-feedback').fadeIn('slow');
        }
    });
});

$('.input-effect textarea').each(function() {
    if ($(this).val().length > 0) {
        $(this).addClass('read-only-input');
    } else {
        $(this).removeClass('read-only-input');
    }
});

/*-------------------------------------------------------------------------------
        End Check Input is empty
    -------------------------------------------------------------------------------*/
$(window).on('load', function() {
    $('.input-effect input, .input-effect textarea').focusout(function() {
        if ($(this).val() != '') {
            $(this).addClass('has-content');
        } else {
            $(this).removeClass('has-content');
        }
    });
});

$('.primary-btn').on('click', function(e) {
    // Remove any old one
    $('.ripple').remove();

    // Setup
    var primaryBtnPosX = $(this).offset().left,
        primaryBtnPosY = $(this).offset().top,
        primaryBtnWidth = $(this).width(),
        primaryBtnHeight = $(this).height();

    // Add the element
    $(this).prepend("<span class='ripple'></span>");

    // Make it round!
    if (primaryBtnWidth >= primaryBtnHeight) {
        primaryBtnHeight = primaryBtnWidth;
    } else {
        primaryBtnWidth = primaryBtnHeight;
    }

    // Get the center of the element
    var x = e.pageX - primaryBtnPosX - primaryBtnWidth / 2;
    var y = e.pageY - primaryBtnPosY - primaryBtnHeight / 2;

    // Add the ripples CSS and start the animation
    $('.ripple')
        .css({
            width: primaryBtnWidth,
            height: primaryBtnHeight,
            top: y + 'px',
            left: x + 'px'
        })
        .addClass('rippleEffect');
});



// profile js
$(".fass_form_toggler").click(function() {
    $(this).parent('.password_wrap_inner').hide();
    $(".fass_form").slideDown();
});
$(".fass_form_close").click(function() {
    $(".fass_form").slideUp();
    $('.password_wrap_inner').show();
});

$(document).on('click', '.btn-modal', function(e) {
    e.preventDefault();
    let container = '.' + $(this).data('container');
    $.ajax({
        url: $(this).data('href'),
        dataType: 'html',
        success: function(result) {
            $(container)
                .html(result)
                .modal('show');

            $(container).on('shown.bs.modal', function() {
                $('input:text:visible:first', this).focus();
            })
        },
        error: function(data) {
            toastr.error('Something is not right!', 'Opps!');
        }
    });
});

if ((window.location.hash && window.location.hash === "#_=_")) {
    // If you are not using Modernizr, then the alternative is:
    if (window.history && history.replaceState) {
        window.history.replaceState("", document.title, window.location.pathname);
    } else {
        // Prevent scrolling by storing the page's current scroll offset
        var scroll = {
            top: document.body.scrollTop,
            left: document.body.scrollLeft
        };
        window.location.hash = "";
        // Restore the scroll offset, should be flicker free
        document.body.scrollTop = scroll.top;
        document.body.scrollLeft = scroll.left;
    }
}

if ($('.datatable').length > 0 && $().DataTable) {
    $.extend(true, $.fn.dataTable.defaults, {
        bLengthChange: false,
        "order": [
            [0, "desc"]
        ],
        language: {
            search: "<i class='ti-search'></i>",
            searchPlaceholder: 'Quick Search',
            paginate: {
                next: "<i class='ti-arrow-right'></i>",
                previous: "<i class='ti-arrow-left'></i>"
            }
        },
        dom: 'Bfrtip',
        buttons: [{
                extend: 'copyHtml5',
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                exportOptions: {
                    columns: ':visible',
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                margin: [10, 10, 10, 0],
                exportOptions: {
                    columns: ':visible',
                    columns: ':not(:last-child)',
                },

            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-file-text"></i>',
                titleAttr: 'CSV',
                exportOptions: {
                    columns: ':visible',
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                exportOptions: {
                    columns: ':visible',
                    columns: ':not(:last-child)',
                },
                orientation: 'landscape',
                pageSize: 'A4',
                margin: [0, 0, 0, 12],
                alignment: 'center',
                header: true,
                customize: function(doc) {
                    doc.content.splice(1, 0, {
                        margin: [0, 0, 0, 12],
                        alignment: 'center',
                        image: 'data:image/png;base64,' + $("#logo_img").val()
                    });
                }

            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print',
                exportOptions: {
                    columns: ':not(:last-child)',
                }
            },
            {
                extend: 'colvis',
                text: '<i class="fa fa-columns"></i>',
                postfixButtons: ['colvisRestore']
            }
        ],
        columnDefs: [{
            visible: false
        }],
        responsive: true,
        columnDefs: [{
            orderable: false,
            searchable: false,
            width: '100px',
            targets: -1
        }, {
            width: '30px',
            targets: 0
        }]
    });
}


$(document).on('click', '#logout', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    $.ajax({
        url: url,
        method: 'Post',
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false,
        dataType: 'JSON',
        success: function(data) {
            toastr.success(data.message, 'Success');
            setTimeout(function() {
                window.location.href = data.goto;
            }, 2000);
        },
        error: function(data) {
            ajax_error(data);
        }
    });
});

$(document).on('keypress', 'input.input_number', function(event) {
    if (is_decimal == 0) {
        if (__currency_decimal_separator == '.') {
            var regex = new RegExp(/^[0-9,-]+$/);
        } else {
            var regex = new RegExp(/^[0-9.-]+$/);
        }
    } else {
        var regex = new RegExp(/^[0-9.,-]+$/);
    }

    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});



/*
=========================================
|                                       |
|               Popovers                |
|                                       |
=========================================
*/

$('.bs-popover').popover();


if($('.primary_select').length){
    $('.primary_select').niceSelect();
}


if ($('.date').length > 0 && $().datepicker) {
    $('.date').datepicker({
        Default: {
            leftArrow: '<i class="fa fa-long-arrow-left"></i>',
            rightArrow: '<i class="fa fa-long-arrow-right"></i>'
        },
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    });

    $(document).on('click', '.date-icon', function() {
        $(this).parent().parent().find('.date').focus();
    });

    $(document).on('click', '.add_month', function() {
        let month = $(this).data('month');
        let new_date = moment().add(month, 'months').format("YYYY-MM-DD");

        $(this).parent().parent().parent().find('.date').val(new_date).datepicker('update');
    })
}

$(document).on('click', '.ajax_request', function (e){
    e.preventDefault();
    var url = $(this).attr('href');
    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'JSON',
        success: function(data) {
            toastr.success(data.message, 'Success');
            if(data.goto){
                setTimeout(function() {
                    window.location.href = data.goto;
                }, 2000);
            }
            if (data.reload){
                setTimeout(function() {
                    window.location.href = '';
                }, 2000);
            }

        },
        error: function(data) {
            ajax_error(data);
        }
    });

})


//on click show description box
$(document).on('click', 'label[for="description"]', function (){
    $(this).removeClass('click_to_show_description');
    $(this).parent().find('textarea').removeClass('sr-only');
});
function ajax_error(data) {
    if (data.status === 404) {
        toastr.error("What you are looking is not found", 'Opps!');
        return;
    } else if (data.status === 500) {
        toastr.error('Something went wrong. If you are seeing this message multiple times, please contact Spondon IT authors.', 'Opps');
        return;
    } else if (data.status === 200) {
        toastr.error('Something is not right', 'Error');
        return;
    }
    let jsonValue = $.parseJSON(data.responseText);
    let errors = jsonValue.errors;
    if (errors) {
        let i = 0;
        $.each(errors, function(key, value) {
            let first_item = Object.keys(errors)[i];
            let error_el_id = $('#' + first_item);
            if (error_el_id.length > 0) {
                error_el_id.parsley().addError('ajax', {
                    message: value,
                    updateClass: true
                });
            }
            // $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
            toastr.error(value, 'Validation Error');
            i++;
        });
    } else {
        toastr.error(jsonValue.message, 'Opps!');
    }
}

function jsUcfirst(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}


function _formValidation(form_id = 'content_form', modal = false, modal_id = 'content_modal', ajax_table = null) {

    const form = $('#' + form_id);

    if (!form.length) {
        return;
    }

    form.parsley().on('field:validated', function() {
        $('.parsley-ajax').remove();
        const ok = $('.parsley-error').length === 0;
        $('.bs-callout-info').toggleClass('hidden', !ok);
        $('.bs-callout-warning').toggleClass('hidden', ok);
    });
    form.on('submit', function(e) {
        e.preventDefault();
        $('.parsley-ajax').remove();
        form.find('.submit').hide();
        form.find('.submitting').show();
        const submit_url = form.attr('action');
        const method = form.attr('method');
        //Start Ajax
        const formData = new FormData(form[0]);
        $.ajax({
            url: submit_url,
            type: method,
            data: formData,
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            dataType: 'JSON',
            success: function(data) {
                // form.trigger("reset");
                // form.find("input:text:visible:first").focus();
                toastr.success(data.message, 'Succes');
                if (modal) {
                    $("." + modal_id).modal('hide');
                }
                if (ajax_table) {
                    ajax_table.ajax.reload();
                }

                if (data.goto) {
                    window.location.href = data.goto;
                }

                if (data.reload) {
                    window.location.href = '';
                }

                form.find('.submit').show();
                form.find('.submitting').hide();

            },
            error: function(data) {
                ajax_error(data);
                form.find('.submit').show();
                form.find('.submitting').hide();
            }
        });
    });
}


function change_status(button, ajax_table = null, change_status = false) {
    $(document).on('click', '#' + button, function(e) {
        e.preventDefault();
        var url = $(this).data('href');
        var status = $(this).data('status');
        var msg = '';
        if (status === 1) {
            msg = 'Change status from active to inactive';
        } else {
            msg = 'Change status from inactive to active';
        }

        if (!change_status) {
            msg = $(this).data('msg');
            if (!msg) {
                msg = 'Once deleted, it will delete all related data also';
            }
        } else {
            url = url + '?action=change_status';
        }

        swal({
                title: 'Are you sure?',
                text: msg,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#66cc99',
                cancelButtonColor: '#ff6666',
                confirmButtonText: 'Yes, Do it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger'
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        method: 'Delete',
                        contentType: false, // The content type used when sending data to the server.
                        cache: false, // To unable request pages to be cached
                        processData: false,
                        dataType: 'JSON',
                        success: function(data) {
                            toastr.success(data.message, 'Success');
                            if (ajax_table) {
                                ajax_table.ajax.reload();
                            }
                        },
                        error: function(data) {
                            ajax_error(data);
                        }
                    });
                }
            });
    });
}


function convertNumber(number) {
    number = parseFloat(number);
    if (isNaN(number)) {
        return 0;
    }

    return number;
}
function imageChangeWithFile(input, srcId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(srcId)
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$('.popUP_clicker').on('click', function () {
    $('.menu_popUp_list_wrapper').toggleClass('active');
});