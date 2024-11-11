<?php include('layouts/header.php'); ?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h1 class="text-center text-primary">Descubra seu Signo</h1>
            <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="mt-4">
                <div class="mb-3">
                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Descobrir</button>
            </form>
        </div>
    </div>
</div>
<?php include('layouts/footer.php'); ?>
