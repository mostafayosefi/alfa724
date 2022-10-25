

        <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist//filepond-plugin-image-preview.min.css">
        <link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.min.css">



      <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
      <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>
      <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js"></script>
      <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
      <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>


{{--

<div class="form-group">

    <div class="custom-file">

        <input type="file"
        class="filepond"
        name="filepond"
        multiple
        data-max-file-size="3MB"
        data-max-files="3" />    <label class="custom-file-label  " for="customFile">آپلود مستندات پرداخت</label>
    </div>
    </div> --}}


        <style>
            /**
 * FilePond Custom Styles
 */
.filepond--drop-label {
  color: #4c4e53;
}

.filepond--label-action {
  text-decoration-color: #babdc0;
}

.filepond--panel-root {
  border-radius: 2em;
  background-color: #edf0f4;
  height: 1em;
}

.filepond--item-panel {
  background-color: #595e68;
}

.filepond--drip-blob {
  background-color: #7f8a9a;
}


/**
 * Page Styles
 */
/* html {
  padding:30vh 0 0;
}

body {
  max-width: 20em;
  margin: 0 auto;
} */
        </style>


<script>
    /*
We want to preview images, so we need to register the Image Preview plugin
*/
FilePond.registerPlugin(

  // encodes the file as base64 data
  FilePondPluginFileEncode,

  // validates the size of the file
  FilePondPluginFileValidateSize,

  // corrects mobile image orientation
  FilePondPluginImageExifOrientation,

  // previews dropped images
  FilePondPluginImagePreview
);

// Select the file input and use create() to turn it into a pond
FilePond.create(
  document.querySelector('input')
);
</script>






