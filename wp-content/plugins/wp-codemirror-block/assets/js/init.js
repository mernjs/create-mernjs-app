if ('undefined' === typeof window.wpcm.editors) {
  window.wpcm.editors = [];
}
(function ($, wpcm, CodeMirror) {
  'use strict';

  wpcm.executable_modes = ['htmlmixed', 'javascript', 'xml', 'jsx', 'vue'];

  // var wpcm_editor_loaded = new Event('wpcm_editor_loaded');
  wpcm.frontEndInitialization = function () {
    var codeBlocks = document.querySelectorAll('.code-block > pre.CodeMirror');

    wpcm.addNotice();

    for (var i = 0; i < codeBlocks.length; i++) {

      var block = codeBlocks[i];
      if (!block.dataset.setting) {
        continue;
      }
      var options = JSON.parse(block.dataset.setting),
        code = codeBlocks[i].textContent,
        id = 'code-block-' + i;

      codeBlocks[i].parentNode.setAttribute('id', i);

      // codeBlocks.id = i;
      block.setAttribute('id', id);

      wpcm.codeMirrorInit(id, code, options, i);
    }

    // this event triggers with all editor instance
    $(document.body).trigger('wpcm_editors_loaded');
  };

  wpcm.codeMirrorInit = function (id, code, options) {
    var el = document.getElementById(id);

    el.style = "display: none";

    var editor = CodeMirror(el.parentNode, {
      // value: code,
      lineNumbers: options.lineNumbers,
      lineWrapping: options.lineWrapping,
      readOnly: options.readOnly,
      scrollbarStyle: "simple",
			firstLineNumber: options.firstLineNumber ? Math.abs(options.firstLineNumber) : 1,
    });

    CodeMirror.autoLoadTheme(editor, options.theme);

    editor.setValue(code);
    if (options.disableCopy) {
      editor.setOption("readOnly", "nocursor");
    }
    // editor.setOption("autoRefresh", 1000);

    editor.setOption("mode", options.mime);
    editor.setOption("theme", options.theme);

    if (options.styleActiveLine) {
      editor.on('blur', (e) => {
        editor.setOption("styleActiveLine", false);
      });
      editor.on('focus', (e) => {
        editor.setOption("styleActiveLine", options.styleActiveLine);
      });
    }

    CodeMirror.autoLoadMode(editor, options.mode);

    if (options.showPanel !== undefined && options.showPanel === false ) {
    } else if(options.showPanel === true || wpcm.panelOptions.showPanel === true){
      editor.getWrapperElement().querySelector('.CodeMirror-simplescroll-vertical').classList.add('adjest-top');
      wpcm.addPanel(editor, options);
    }

    if (wpcm.executable_modes.includes(options.mode)) {
      wpcm.renderOutputBlock(el);
    }

    wpcm.editors.push(editor);

    $(document.body).trigger('wpcm_editor_loaded', [editor]);
    // Listen for the event.
    // document.addEventListener('wpcm_editor_loaded', function (e) { return editor }, false);
    // Dispatch the event.
    // document.dispatchEvent(wpcm_editor_loaded);
    // var event = new CustomEvent('wpcm_editor_loaded', { detail: editor });
    // document.dispatchEvent(event);

  }

  wpcm.addNotice = function () {
    var div = document.createElement('div');
    div.className = 'CodeMirror-notice';
    document.body.appendChild(div);
  }

  wpcm.showNotice = function (notice, style) {
    var div = document.querySelector('.CodeMirror-notice');
    div.innerHTML = notice;
    div.setAttribute('style', ['bottom: 15px;'].join(''));

    setTimeout(() => {
      div.removeAttribute('style');
    }, 3000);
  }

  wpcm.addPanel = function (editor, options) {
    var panel = document.createElement("div"),
      info = document.createElement("div"),
      controls = document.createElement("div"),

      language = document.createElement("span"),
      wrapper = editor.getWrapperElement();

    panel.className = "CodeMirror-panel";
    info.className = "info-panel";

    controls.className = 'control-panel';

    if (options.languageLabel == 'no') {
    } else if (window.wpcm.panelOptions.languageLabel == 'language' || (options.languageLabel == 'language')) {
      language.textContent = options.language;
      language.className = 'language ' + options.language.toLowerCase();
      language.className += (options.modeName) ? " "+options.modeName.toLowerCase() : "";

    } else if ( window.wpcm.panelOptions.languageLabel == 'file' || options.languageLabel == 'file') {
      language.textContent = options.fileName ? options.fileName : options.language;
      language.className = 'language ' + options.language.toLowerCase();
      language.className += (options.modeName) ? " "+options.modeName.toLowerCase() : "";
    }
    info.appendChild(language);

    if (window.wpcm.panelOptions.runButton) {
      if (wpcm.executable_modes.includes(options.mode)) {
        var run = document.createElement("span"),
          runButton = document.createElement("b");
        run.classList = 'tool';
        run.setAttribute('data-tip', 'Execute Code');
        // run.setAttribute('title', 'Execute Code');

        runButton.className = 'run-code execute-code';
        run.onclick = wpcm.executeCode;
        run.appendChild(runButton);
        controls.appendChild(run);
      }
    }

    if (window.wpcm.panelOptions.fullScreenButton) {
      var fullScreen = document.createElement("span"),
        fullScreenButton = document.createElement("b");

      fullScreen.classList = 'tool';
      fullScreen.setAttribute('data-tip', 'Full Screen');
      // fullScreen.setAttribute('title', 'Full Screen');

      fullScreenButton.className = 'fullscreen maximize';
      fullScreenButton.onclick = wpcm.setFullScreen;
      fullScreen.appendChild(fullScreenButton);
      controls.appendChild(fullScreen);
    }

    if (window.wpcm.panelOptions.copyButton) {
      if (!options.disableCopy) {
        var copy = document.createElement("span"),
          copyButton = document.createElement("b");

        copy.classList = 'tool';
        copy.setAttribute('data-tip', 'Copy Code');
        // copy.setAttribute('title', 'Copy Code');

        copyButton.className = 'copy';
        copyButton.onclick = wpcm.copyToClipboard;
        copy.appendChild(copyButton);

        controls.appendChild(copy);
      }
    }

    info.appendChild(controls);
    panel.appendChild(info);

    wrapper.insertBefore(panel, wrapper.firstChild);
  }

  wpcm.executeCode = function (e) {
    var el = this,
      code_block = el.closest('.code-block'),
      editorId = code_block.id,
      editor = wpcm.editors[editorId],
      editorContent = editor.getValue(),
      output_frame = code_block.querySelector('.output-block-frame'),
      iframe = null;

    output_frame.classList.add('show');

    iframe = (output_frame.contentWindow)
      ? output_frame.contentWindow : (
        output_frame.contentDocument.document
          ? output_frame.contentDocument.document : output_frame.contentDocument);

    iframe.document.open();
    iframe.document.write(editorContent);
    iframe.document.close();

    $('html, body').animate({
      scrollTop: $(output_frame).offset().top - 80
    }, 600);
  };

  // to set height of output frame after load
  wpcm.styleOutputBlock = function (e) {
    var output_frame = e.target,
      iframe = null,
      newHeight = 0;

    if (output_frame.classList.contains('first-load')) {
      output_frame.classList.remove('first-load');
      return;
    }

    iframe = (output_frame.contentWindow)
      ? output_frame.contentWindow : (
        output_frame.contentDocument.document
          ? output_frame.contentDocument.document : output_frame.contentDocument);

    output_frame.setAttribute('style', 'height:200px');
    if (iframe.document.body) {
      // iframe.document.body.style.overflow = 'hidden';
      newHeight = Math.round(iframe.document.body.scrollHeight) + 25;
      if (newHeight > 200) {
        output_frame.setAttribute('style', 'height:' + newHeight + 'px');
      }
    } else {
      output_frame.setAttribute('style', 'height:70vh');
    }
  }

  wpcm.renderOutputBlock = function (el) {
    var iframe = document.createElement('iframe');
    iframe.classList.add('output-block-frame', 'first-load');
    iframe.onload = wpcm.styleOutputBlock;
    iframe.style.height = '100px';
    iframe.src = "";
    el.parentNode.append(iframe);
  }

  wpcm.setFullScreen = function () {
    var el = this,
      code_block = el.closest('.code-block'),
      editorId = code_block.id,
      editor = wpcm.editors[editorId],
      adminBar = document.getElementById('wpadminbar');

    if (el.classList.contains("maximize")) {
      el.classList.remove('maximize');
      el.classList.add('restore');
      el.closest('.CodeMirror').classList.add('CodeMirror-fullscreen');

      // add top position to fix 'wp-admin bar'
      if (typeof (adminBar) != 'undefined' && adminBar != null) {
        el.closest('.CodeMirror').classList.add('adjest-top');
      }

      document.documentElement.style.overflow = "hidden";
    } else {
      el.classList.remove('restore');
      el.classList.add('maximize');
      el.closest('.CodeMirror').classList.remove('CodeMirror-fullscreen', 'adjest-top');
      document.documentElement.style.overflow = "";
    }
    editor.refresh();
  }

  wpcm.copyToClipboard = function () {
    var el = this,
      code_block = el.closest('.code-block'),
      editorId = code_block.id,

      content = wpcm.editors[editorId].getValue();

    if (window.clipboardData) { // For Internet Explorer
      // console.log('clipbord data');
      window.clipboardData.setData("Text", content);
    } else {
      var textarea = document.createElement('textarea');

      textarea.className = 'CodeMirror-ClipBoard';
      document.body.appendChild(textarea);
      textarea.appendChild(document.createTextNode(content));
      textarea.select();
      try {
        // Now that we've selected the anchor text, execute the copy command
        var successful = document.execCommand('copy');
        var notice = successful ? 'Copied to cliboard' : 'Can not copied';
      } catch (err) {
        notice = 'Oops, unable to copy';
      }
      // console.log(notice);
      wpcm.showNotice(notice, '');
      textarea.remove();
    }

  }

})(window.jQuery, window.wpcm, window.CodeMirror);

// Front End Initialization
wpcm.frontEndInitialization();

jQuery(document).ready(function () {
  // to refresh the editor on some browser
  setTimeout(() => {
    for (var i = 0; i < wpcm.editors.length; i++) {
      wpcm.editors[i].refresh();
    }
  }, 1500);
});
