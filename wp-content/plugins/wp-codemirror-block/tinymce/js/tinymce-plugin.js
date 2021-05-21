/*! Code Block TinyMCE Plugin 1.1.0  */
(function () {
  'use strict';

  // check for global Code Block config availability
  if (typeof wpcm == 'undefined') {
    // show error message
    console.error('wpcm not loaded!');
    // terminate plugin loading
    return;
  }

  // check for tinyMce availability
  if (typeof tinyMCE == 'undefined') {
    // show error message
    console.error('TinyMCE not loaded');
    // terminate plugin loading
    return;
  }

  // shortcuts
  var _tinyMCE = tinyMCE;
  var _defaults = wpcm.defaults;
  var plugin = function (editor, url) {
    window.TmEditor = editor;

    // is the given node a CodeMirror Block ?
    var isCodeMirrorBlock = function (node) {
      return (node.nodeName == 'PRE' && editor.dom.hasClass(node.parentElement, 'code-block'));
    };

    // generate key/value list from object for tinyMCE select-box
    var toSelectList = (function (input) {
      // base entry
      var list = [];
      // var list = [{
      //     text: 'Default (Global-Settings)',
      //     value: null
      // }];

      _tinyMCE.each(input, function (label, value) {
        list.push({
          text: label,
          value: value
        });
      });

      return list;
    });

    // generate language mode list values
    var mimeList = toSelectList(wpcm.mimes);

    // generate theme values
    var themeList = toSelectList(wpcm.themes);

    // CodeMirror Block Editor Plugin
    var Dialog = {
      open: function (view, cb) {
        // add submit callback
        view.onsubmit = cb;

        // Open new editor window / overlay form
        editor.windowManager.open(view);
      }
    };


    var Toolbar = {

      // show toolbar on top of the boundingNode
      show: function (boundingNode, editAction) {
        // recreation is required for WordPress editor switch visual/text mode!
        Toolbar.hide();
        // get the current node settings

        // create new toolbar object
        var toolbar = editor.dom.create('div', {
          'class': 'wpcm-toolbar',
          'id': 'wpcm-toolbar',
          'data-mce-bogus': '1',
          'contenteditable': false
        });

        var container = editor.dom.create('div', {
          'class': 'wpcm-toolbar-container',
          'data-mce-bogus': '1',
        });

        var settings = getCodeBlockSettings(boundingNode, false);

        var spanLanguage = editor.dom.create('span', {
          'class': 'info language',
          'data-mce-bogus': '1',
          'contenteditable': false,
          'title': 'Language: ' + wpcm.mimes[settings.mime],
        });
        container.appendChild(spanLanguage);

        var spanTheme = editor.dom.create('span', {
          'class': 'info theme',
          'data-mce-bogus': '1',
          'contenteditable': false,
          'title': 'Theme: ' + wpcm.themes[settings.theme]
        });
        container.appendChild(spanTheme);
        /*
        if (settings.lineNumbers == true) {
          var spanLineNumbers = editor.dom.create('span', {
            'class': 'info lineNumbers',
            'data-mce-bogus': '1',
            'contenteditable': false,
            'title': 'Line Number? Yes',
          });
          // spanLineNumbers.innerHTML = 'Line Number?<b>Yes</b>';
          container.appendChild(spanLineNumbers);
        }
        if (settings.styleActiveLine == true) {
          var spanStyleActiveLine = editor.dom.create('span', {
            'class': 'info styleActiveLine',
            'data-mce-bogus': '1',
            'contenteditable': false,
            'title': 'Highlight Active Line? Yes',
          });
          container.appendChild(spanStyleActiveLine);
        }
        if (settings.readOnly == true) {
          var spanReadOnly = editor.dom.create('span', {
            'class': 'info ReadOnly',
            'data-mce-bogus': '1',
            'contenteditable': false,
            'title': 'Highlight Active Line? Yes'
          });
          container.appendChild(spanReadOnly);
        }
        if (settings.lineWrapping == true) {
          var spanLineWrapping = editor.dom.create('span', {
            'class': 'info LineWrapping',
            'data-mce-bogus': '1',
            'contenteditable': false,
            'title': 'Warp Long Line? Yes',
          });
          container.appendChild(spanLineWrapping);
        }
        */
      if (settings.align) {
        var alignText = (settings.align == 'full') ? 'Full' : 'Wide';
        var spanAlign = editor.dom.create('span', {
          'class': 'info align',
          'data-mce-bogus': '1',
          'contenteditable': false,
          'title': alignText + ' Width',
        });
        // spanLineNumbers.innerHTML = 'Line Number?<b>Yes</b>';
        container.appendChild(spanAlign);
      }
      var editSpan = editor.dom.create('span', {
          'class': 'wpcm-edit-icon',
          'data-mce-bogus': '1',
        });
        container.appendChild(editSpan);

        // display the settings dialog on click
        editor.dom.bind(editSpan, 'mousedown', function (e) {
          e.stopPropagation();
          editAction();
        });

        toolbar.appendChild(container);


        // add toolbar to editor area
        editor.getBody().appendChild(toolbar);

        // get bounding content rect for absolute positioning
        var rect = editor.dom.getRect(boundingNode.parentNode);

        // console.log('rect', rect);

        // show toolbar and set position
        editor.dom.setStyles(toolbar, {
          top: rect.y,
          left: rect.x,
          // bottom: rect.h,
          width: rect.w
        });
      },

      // remove the codeblock edit toolbar
      hide: function () {
        var tb = editor.dom.get('wpcm-toolbar');
        if (tb) {
          editor.dom.remove(tb);
        }
      }
    };

    // Load Edit Dialog Views with setting.
    var codeEditDialog = function (settings, inlineMode) {
      return {
        title: 'Edit CodeMirror Block',
        minWidth: 700,
        body: [{
            type: 'listbox',
            name: 'mime',
            label: 'Language / Mode',
            values: mimeList,
            value: settings.mime,
            style: 'direction: ltr; text-align: left'
          },
          {
            type: 'listbox',
            name: 'theme',
            label: 'Theme',
            values: themeList,
            value: settings.theme,
            style: 'direction: ltr; text-align: left'
          },
          {
            type: 'checkbox',
            name: 'lineNumbers',
            label: 'Show Line Numbers?',
            checked: settings.lineNumbers,
            // disabled: inlineMode
          },
          {
            type: 'checkbox',
            name: 'styleActiveLine',
            label: 'Highlight Active Line?',
            checked: settings.styleActiveLine,
            // disabled: inlineMode
          },
          {
            type: 'checkbox',
            name: 'lineWrapping',
            label: 'Warp Long Line?',
            checked: settings.lineWrapping,
            // disabled: inlineMode
          },
          {
            type: 'listbox',
            name: 'readOnly',
            label: 'Frontend Options?',
            values: [{
                text: "Default",
                value: true
              },
              {
                text: "Editable",
                value: false
              },
              {
                text: "Disable Copy",
                value: "nocursor"
              },
            ],
            value: settings.readOnly,
            style: 'direction: ltr; text-align: left',
            // disabled: true
          },
          {
            type: 'listbox',
            name: 'align',
            label: 'Alignment',
            values: [{
                text: "Normal",
                value: ""
              },
              {
                text: "Wide Width",
                value: "wide"
              },
              {
                text: "Full Width",
                value: "full"
              },
            ],
            value: settings.align,
            style: 'direction: ltr; text-align: left'
          }
        ]
      }
    };

    var codeInsertDialog = function (_width, _height) {
      return {
        title: 'Add CodeMirror Block',
        layout: 'flex',
        direction: 'column',
        align: 'stretch',
        width: _width - 350,
        height: _height - 150,
        body: [{
            type: 'textbox',
            name: 'code',
            flex: 1,
            multiline: true,
            spellcheck: false,
            style: 'direction: ltr; text-align: left',
            classes: 'monospace',
            autofocus: true
          },
          {
            type: 'listbox',
            name: 'mime',
            label: 'Language / Mode',
            values: mimeList,
            value: _defaults.mime,
            style: 'direction: ltr; text-align: left'
          },
          {
            type: 'listbox',
            name: 'theme',
            label: 'Theme',
            values: themeList,
            value: _defaults.theme,
            style: 'direction: ltr; text-align: left'
          },
          {
            type: 'checkbox',
            name: 'lineNumbers',
            label: 'Show Line Numbers?',
            checked: _defaults.lineNumbers,
            // disabled: true
          },
          {
            type: 'checkbox',
            name: 'styleActiveLine',
            label: 'Highlight Active Line?',
            checked: _defaults.styleActiveLine,
            // disabled: true
          },
          {
            type: 'checkbox',
            name: 'lineWrapping',
            label: 'Warp Long Line?',
            checked: _defaults.lineWrapping,
            // disabled: true
          },
          {
            type: 'listbox',
            name: 'readOnly',
            label: ' on Frontend?',
            values: [{
                text: "Normal",
                value: true
              },
              {
                text: "Editable",
                value: false
              },
              {
                text: "Disable Copy",
                value: "nocursor"
              },
            ],
            value: _defaults.readOnly,
            style: 'direction: ltr; text-align: left',
            // disabled: true
          },
          {
            type: 'listbox',
            name: 'align',
            label: 'Alignment',
            values: [{
                text: "Normal",
                value: ""
              },
              {
                text: "Wide Width",
                value: "wide"
              },
              {
                text: "Full Width",
                value: "full"
              }
            ],
            value: '', //_defaults.align,
            style: 'direction: ltr; text-align: left'
          }
        ]
      }
    };

    // Load Modules
    var codeInsertAction = function () {

      // get dimensions
      var editorDimensions = editor.dom.getViewPort();

      // calculate dialog size
      var dialogWidth = Math.min(editorDimensions.w, window.innerWidth) || 700;
      var dialogHeight = Math.min(editorDimensions.h, window.innerHeight) || 500;

      // create the dialog
      Dialog.open(codeInsertDialog(dialogWidth, dialogHeight), function (e) {
        // get code - replace windows style line breaks
        var data_settings = {},
          code = e.data.code.replace(/\r\n/gmi, '\n'),
          align;

        data_settings['mode'] = wpcm.modes[e.data.mime];
        data_settings['mime'] = e.data.mime;
        data_settings['theme'] = e.data.theme;
        data_settings['lineNumbers'] = e.data.lineNumbers;
        data_settings['lineWrapping'] = e.data.lineWrapping;
        data_settings['styleActiveLine'] = e.data.styleActiveLine;
        data_settings['readOnly'] = e.data.readOnly;
        data_settings['align'] = e.data.align;


        // entities encoding
        data_settings = JSON.stringify(data_settings);

        code = _tinyMCE.html.Entities.encodeAllRaw(code);

        // surround with spaces ?
        var sp = (true ? '&nbsp;' : ' '),
        align = (e.data.align != '') ? 'align' + e.data.align : '';

        // Insert CodeMirror Block into editors current position when the window form is "submitted"
        editor.insertContent(sp + '<div class="wp-block-codemirror-blocks code-block ' + align + '">' + '<pre class="CodeMirror" data-setting="' + escapeHTML(data_settings) + '">' + code + '</pre></div>' + sp);
      });
    };

    var escapeHTML = function (value) {
      var htmlString = value
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
      return htmlString;
    }

    // get the codemirror settings of the current selected node
    var getCodeBlockSettings = function (node, inlineMode) {

      // if codemirror element ?
      if (!isCodeMirrorBlock(node)) {
        return {};
      }

      // get line number attribute (null: not set | true/false)
      var config,
        blockSetting = node.getAttribute('data-setting'),
        _readOnly;
      // blockSetting = getBlockSettingFromComment(node),
      blockSetting = JSON.parse(blockSetting);

      if (blockSetting) {
        // if (blockSetting.readOnly !== undefined) {
        //   if (blockSetting.readOnly === true) {
        //     _readOnly = blockSetting.readOnly;
        //   } else {
        //     _readOnly = false;
        //   }
        // }
        config = {
          // mode: blockSetting.mode || _defaults.mode,
          mime: blockSetting.mime !== undefined ? blockSetting.mime : _defaults.mime,
          theme: blockSetting.theme !== undefined ? blockSetting.theme : _defaults.theme,
          lineNumbers: blockSetting.lineNumbers !== undefined ? blockSetting.lineNumbers : _defaults.lineNumbers,
          styleActiveLine: blockSetting.styleActiveLine !== undefined ? blockSetting.styleActiveLine : _defaults.styleActiveLine,
          lineWrapping: blockSetting.lineWrapping !== undefined ? blockSetting.lineWrapping : _defaults.lineWrapping,
          // readOnly: _readOnly,
          readOnly: blockSetting.readOnly !== undefined ? blockSetting.readOnly : _defaults.readOnly,
          // disableCopy: (blockSetting.readOnly !== undefined && blockSetting.readOnly == 'nocursor') ? true : false,
          align: blockSetting.align !== undefined ? blockSetting.align : _defaults.align,
        };
      } else {
        config = {
          // mode: blockSetting.mode || _defaults.mode,
          mime: _defaults.mime,
          theme: _defaults.theme,
          lineNumbers: _defaults.lineNumbers,
          styleActiveLine: _defaults.styleActiveLine,
          lineWrapping: _defaults.lineWrapping,
          readOnly: _defaults.readOnly,
          // disableCopy: false,
          align: _defaults.align
        };
      }
      // generate config
      return config;
    };

    // set the codemirror settings of the current node
    var setCodeBlockSettings = function (node, settings) {

      // codemirror element ?
      if (!isCodeMirrorBlock(node)) {
        return;
      }

      node.parentNode.classList.remove('alignfull');
      node.parentNode.classList.remove('alignwide');

      if (settings.align != '') {
        node.parentNode.classList.add('align' + settings.align);
      }

      var data_settings = JSON.stringify(settings);

      var newElement = editor.dom.create('pre', {
        'class': 'CodeMirror',
        'data-setting': data_settings
      });

      // replace
      editor.dom.replace(newElement, node, true);
      node = newElement;

      Toolbar.show(node, codeEditAction);
    };

    var codeEditAction = (function () {
      // get current node
      var node = editor.selection.getNode();

      // get the current node settings
      var settings = getCodeBlockSettings(node, false);

      // open new overlay window
      Dialog.open(codeEditDialog(settings, false), function (e) {

        // apply the codemirror specific node attributes to the current selected node
        setCodeBlockSettings(node, {
          mode: wpcm.modes[e.data.mime],
          mime: e.data.mime,
          theme: e.data.theme,
          lineNumbers: e.data.lineNumbers,
          lineWrapping: e.data.lineWrapping,
          styleActiveLine: e.data.styleActiveLine,
          readOnly: e.data.readOnly,
          // disableCopy: e.data.disableCopy,
          align: e.data.align
        });
      });
    });

    // is a codemirror node (pre element) selected/focused ?
    var codeBlockNodeActive = false;

    // listen on editor paste events
    editor.on('PastePreProcess', function (e) {
      // paste event within an codemirror codeblock ?
      if (codeBlockNodeActive) {
        // stop further event processing
        e.stopPropagation();
        // remove outer pre tags
        // avoids the creation of additional pre sections within the editor pane when pasting into an active section
        e.content = e.content
          .replace(/^\s*<pre(.*?)>([\s\S]+)<\/pre>\s*$/gi, '$2')

          // keep line breaks
          .replace(/\n/g, '<BR/>')

          // keep indentation
          .replace(/ /g, '&nbsp;')

          // drop wysiwyg paste formats
          .replace(/<span(.*?)>/g, '')
          .replace(/<\/span>/g, '');
      }
    });

    // codemirror settings button (menubar)
    var editMenuButton = null;
    var editorToolbar = null;

    // listen on Blur Event to show/hide the toolbar
    editor.on('focus', function (e) {
      // e.stopPropagation();
      editorToolbar = true;
    });

    // listen on SaveContent Event to show/hide the toolbar
    editor.on('Submit', function (e) {
      e.stopPropagation();
      editorToolbar = null;
      Toolbar.hide();
    });

    var lastNode = null;
    // listen on NodeChange Event to show/hide the toolbar
    editor.on('NodeChange', function (e) {
      e.stopPropagation();

      // get current node
      var node = editor.selection.getNode();
      if (node === lastNode) {
        return;
      } else {
        lastNode = node;
      }

      // console.log(node.nodeName);

      // show hide edit menu button
      if (editMenuButton) {
        if (isCodeMirrorBlock(node)) {
          codeBlockNodeActive = true;
          editMenuButton.disabled(false);
        } else {
          codeBlockNodeActive = false;
          editMenuButton.disabled(true);
        }
      }

      if (editorToolbar && isCodeMirrorBlock(node)) {
        Toolbar.show(node, codeEditAction);
      } else {
        Toolbar.hide();
      }

    });

    // Add Code Insert Button to toolbar
    editor.addButton('codemirror-block', {
      title: 'CodeMirror Block',
      image: url + '/code-block.png',

      onclick: codeInsertAction
    });

    // Add Code Edit Button to toolbar
    editor.addButton('codemirror-block-edit', {
      title: 'CodeMirror Block Settings',
      disabled: true,
      image: url + '/code-block-setting.png',

      // store menu button instance
      onPostRender: function () {
        editMenuButton = this;
      },

      onclick: codeEditAction
    });

  };

  // register plugin
  _tinyMCE.PluginManager.add('wpcm_plugin', plugin);

})();
