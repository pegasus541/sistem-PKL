<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Preview Surat Penerimaan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.377/pdf_viewer.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.377/pdf.js"></script>
</head>
<body>
    <div id="pdf-viewer"></div>

    <script>
        var pdfFile = "{{ asset($filePath) }}";

        // Fungsi untuk memuat dan menampilkan PDF
        function loadPdf(pdfUrl) {
            var loadingTask = pdfjsLib.getDocument(pdfUrl);
            loadingTask.promise.then(function(pdf) {
                // Dapatkan objek halaman pertama
                pdf.getPage(1).then(function(page) {
                    var scale = 1.5;
                    var viewport = page.getViewport({ scale: scale });

                    // Muat PDF ke div dengan id "pdf-viewer"
                    var pdfViewer = document.getElementById('pdf-viewer');
                    pdfViewer.innerHTML = ''; // Hapus konten sebelumnya jika ada
                    var canvas = document.createElement('canvas');
                    canvas.id = 'pdf-canvas';
                    pdfViewer.appendChild(canvas);
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render halaman pertama PDF
                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext);
                });
            });
        }

        // Memuat PDF saat dokumen siap
        document.addEventListener('DOMContentLoaded', function() {
            loadPdf(pdfFile);
        });
    </script>
</body>
</html>
