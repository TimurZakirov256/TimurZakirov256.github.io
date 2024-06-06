<?php
include 'script.php';


if (!function_exists('get_items')) {
    die('Function get_items() does not exist!');
}

$items = get_items();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Haven - Список</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="logo.jfif" alt="Pet Haven Logo" class="logo">
                <span class="site-title">Pet Haven</span>
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Главная</a></li>
                    <li class="nav-item"><a class="nav-link" href="order.html">Заказ</a></li>
                    <li class="nav-item"><a class="nav-link active" href="list.php">Список</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container my-5">
        <div class="row mb-4">
            <div class="col-md-6">
                <input type="text" class="form-control" id="searchInput" placeholder="Поиск..." onkeyup="filterCards()">
            </div>
        </div>
        <div class="row" id="itemList">
            <?php foreach ($items as $item): ?>
                <div class="col-md-4 mb-4 card-container">
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo htmlspecialchars($item['title']); ?></h3>
                            <p class="card-text"><?php echo htmlspecialchars($item['description']); ?></p>
                            <a href="<?php echo htmlspecialchars($item['link']); ?>" class="btn btn-primary" target="_blank">Подробнее</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Pet Haven. Все права защищены.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function filterCards() {
            const searchText = document.getElementById('searchInput').value.toLowerCase();
            const cardContainers = document.querySelectorAll('.card-container');

            cardContainers.forEach(container => {
                const cardTitle = container.querySelector('.card-title').textContent.toLowerCase();
                const cardDescription = container.querySelector('.card-text').textContent.toLowerCase();

                if (cardTitle.includes(searchText) || cardDescription.includes(searchText)) {
                    container.style.display = 'block';
                } else {
                    container.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>
