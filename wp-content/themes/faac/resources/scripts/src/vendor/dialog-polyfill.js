/**
 * Dialog Polyfill settings
 */
import dialogPolyfill from 'dialog-polyfill';

const dialog = document.querySelectorAll('dialog');

dialog.forEach(
  function(element) {
    dialogPolyfill.registerDialog(element);
  }
);