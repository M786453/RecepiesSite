
  document.getElementById('phone').addEventListener('click', function(event) {
    event.preventDefault(); // Prevents the default link behavior

    // Your copyToClipboard function here
    function copyToClipboard(text) {
      navigator.clipboard.writeText(text)
        .then(() => {
          console.log('Text copied to clipboard');
        })
        .catch((error) => {
          console.error('Error copying text to clipboard:', error);
        });
    }

    // Copy the desired text when the link is clicked
    copyToClipboard("+0123456789");
  });







