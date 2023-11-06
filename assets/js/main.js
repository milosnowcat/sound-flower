function randomPassword(length) {
  const characters =
    'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  let password = '';

  for (let index = 0; index < length; index++) {
    password += characters.charAt(
      Math.floor(Math.random() * characters.length)
    );
  }

  return password;
}

function previewImg(input, img) {
  let preview = document.getElementById(input);
  let file = document.getElementById(img).files[0];
  let reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = '';
  }
}

export { randomPassword, previewImg };
