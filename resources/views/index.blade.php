<x-layouts.main>
        <h1 class="text-center mb-4">Добро пожаловать на наш сайт!</h1>
        <p class="text-center text-muted mb-5">
            Здесь вы можете найти информацию о наших автомобилях, тегах и брендах. Выберите интересующий раздел, чтобы узнать больше.
        </p>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card text-center shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Машины</h5>
                        <p class="card-text text-muted">Откройте для себя наши последние модели и предложения.</p>
                        <a href="{{ route('cars.index') }}" class="btn btn-primary">Посмотреть машины</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Теги</h5>
                        <p class="card-text text-muted">Просмотрите популярные теги, чтобы легко найти нужное.</p>
                        <a href="{{ route('tags.index') }}" class="btn btn-primary">Посмотреть теги</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Бренды</h5>
                        <p class="card-text text-muted">Узнайте больше о брендах, с которыми мы сотрудничаем.</p>
                        <a href="{{ route('brands.index') }}" class="btn btn-primary">Посмотреть бренды</a>
                    </div>
                </div>
            </div>
        </div>
</x-layouts.main>
