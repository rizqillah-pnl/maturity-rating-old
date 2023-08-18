<div id="word-container" class=""></div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="{{ asset('js/docx-preview.js') }}"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", () => {
        //Read the Word Document data from the File Upload.
        fetch('{!! url('/') . '/' . $file !!}')
            .then(res => res.blob()) // Gets the response and returns it as a blob
            .then(blob => {
                // Here, I use it to make an image appear on the page
                // let objectURL = URL.createObjectURL(blob);
                // let myImage = new Image();
                // myImage.src = objectURL;
                // document.getElementById('myImg').appendChild(myImage)

                //If Document not NULL, render it.
                if (blob != null) {
                    //Set the Document options.
                    var docxOptions = Object.assign(docx.defaultOptions, {
                        useMathMLPolyfill: true
                    });
                    //Reference the Container DIV.
                    var container = document.querySelector("#word-container");

                    //Render the Word Document.
                    docx.renderAsync(blob, container, null, docxOptions);
                }
            });
    });
</script>
