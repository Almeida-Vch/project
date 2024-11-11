<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body text-center">
            <?php
            $data_nascimento = $_POST['data_nascimento'];
            $signos = simplexml_load_file("signos.xml");

            $data_nasc = DateTime::createFromFormat('Y-m-d', $data_nascimento);
            $ano = $data_nasc->format('Y');

            function createFullDate($dateStr, $year) {
                $dateParts = explode('/', $dateStr);
                return DateTime::createFromFormat('d/m', $dateStr)->setDate($year, (int)$dateParts[1], (int)$dateParts[0]);
            }

            $signoEncontrado = null;

            foreach ($signos->signo as $signo) {
                $dataInicio = createFullDate($signo->dataInicio, $ano);
                $dataFim = createFullDate($signo->dataFim, $ano);

                // Corrige Capricórnio
                if ($dataFim < $dataInicio) {
                    $dataFim->modify('+1 year');
                }

                if ($data_nasc >= $dataInicio && $data_nasc <= $dataFim) {
                    $signoEncontrado = $signo;
                    break;
                }
            }

            if ($signoEncontrado) {
                echo "<h2 class='text-success'>Seu Signo: {$signoEncontrado->signoNome}</h2>";
                echo "<p class='mt-3'>{$signoEncontrado->descricao}</p>";
            } else {
                echo "<h2 class='text-danger'>Signo não encontrado.</h2>";
            }
            ?>
            <a href="index.php" class="btn btn-secondary mt-4">Voltar</a>
        </div>
    </div>
</div>

<?php include('layouts/footer.php'); ?>
