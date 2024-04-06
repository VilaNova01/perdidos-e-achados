<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Estatístico</title>
    <style>
        /* Estilos CSS para o relatório */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Relatório Estatístico</h1>
        
        <h2>Dados Estatísticos</h2>
        <table>
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Categoria A</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>Categoria B</td>
                    <td>200</td>
                </tr>
                <!-- Adicione mais linhas conforme necessário -->
            </tbody>
        </table>
        
        <!-- Adicione mais elementos conforme necessário, como gráficos, etc. -->
    </div>

    <!-- Script para gerar PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script>
        // Função para gerar PDF e abrir em nova guia
        function gerarPDF() {
            var element = document.querySelector('.container');
            html2pdf().from(element).toPdf().get('pdf').then(function(pdf) {
                var blobUrl = URL.createObjectURL(pdf);
                window.open(blobUrl);
            });
        }
    </script>

    <!-- Botão para gerar PDF -->
    <button onclick="gerarPDF()">Gerar PDF</button>
</body>
</html>
