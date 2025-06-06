<?php
/**
 * Страница с описанием ламината "Дуб Апулия"

class LaminateProduct {
    private $productData;
    private $additionalInfo;
    
    public function __construct() {
        $this->initializeProductData();
    }
    
    private function initializeProductData() {
        $this->productData = [
            'title' => 'Ламинат "Дуб Апулия"',
            'description' => 'Превосходное напольное покрытие, которое придает вашему интерьеру натуральный и элегантный вид. Создает теплую и уютную атмосферу в вашем доме.',
            'features' => [
                'thickness' => ['label' => 'Толщина', 'value' => '8 мм', 'icon' => '📏'],
                'material' => ['label' => 'Материал', 'value' => 'Высококачественный ХДФ', 'icon' => '🌳'],
                'installation' => ['label' => 'Укладка', 'value' => 'Система замков без пропитки', 'icon' => '🧩'],
                'area' => ['label' => 'Площадь в упаковке', 'value' => '2.22 м²', 'icon' => '📦'],
                'wear_class' => ['label' => 'Класс износостойкости', 'value' => '33 (коммерческое использование)', 'icon' => '🛡️'],
                'water_resistant' => ['label' => 'Водостойкость', 'value' => false, 'icon' => '💧']
            ],
            'rooms' => [
                'suitable' => ['спальня', 'гостиная', 'коридор'],
                'not_suitable' => 'ванные комнаты и другие помещения с повышенной влажностью'
            ],
            'design' => [
                'note' => 'Передает рисунок древесины с естественными вариациями оттенков и сучков',
                'tip' => 'Чередуйте панели из разных пачек для естественного вида'
            ]
        ];
        
        $this->additionalInfo = [
            'certificates' => 'Актуальные сертификаты доступны при обращении в магазин',
            'color_warning' => 'Цвет на экране может отличаться от реального из-за настроек вашего устройства',
            'contact' => 'Для дополнительной информации свяжитесь с нашим менеджером'
        ];
    }
    
    public function renderProductPage() {
        $this->renderHTMLHeader();
        $this->renderProductHeader();
        $this->renderFeaturesSection();
        $this->renderUsageRecommendations();
        $this->renderDesignFeatures();
        $this->renderAdditionalInfo();
        $this->renderFooter();
    }
    
    private function renderHTMLHeader() {
        ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($this->productData['description']) ?>">
    <title><?= htmlspecialchars($this->productData['title']) ?> | Подробное описание</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #e74c3c;
            --light-bg: #f9f9f9;
            --text-color: #333;
            --muted-text: #7f8c8d;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.5;
            color: var(--text-color);
            max-width: 902px;
            margin: 0 auto;
            padding: 21px;
            background-color: #fff;
        }
        
        h1, h2 {
            color: var(--primary-color);
            margin-top: 1.6em;
        }
        
        h1 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 11px;
        }
        
        .feature-card {
            background-color: var(--light-bg);
            padding: 21px;
            border-radius: 8px;
            margin-bottom: 21px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        
        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 10px;
        }
        
        .feature-icon {
            font-size: 1.3em;
            margin-top: 3px;
        }
        
        .warning {
            color: var(--accent-color);
            font-weight: 600;
            background-color: rgba(231, 76, 60, 0.1);
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }
        
        .note {
            font-style: italic;
            color: var(--muted-text);
            border-left: 3px solid var(--muted-text);
            padding-left: 10px;
        }
        
        .tag {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 3px 7px;
            border-radius: 3px;
            font-size: 0.8em;
            margin-right: 4px;
        }
        
        footer {
            margin-top: 41px;
            padding-top: 22px;
            border-top: 1px solid #eee;
            color: var(--muted-text);
            font-size: 0.9em;
        }
        
        @media (max-width: 603px) {
            .feature-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
        <?php
    }
    
    private function renderProductHeader() {
        ?>
        <h1><?= htmlspecialchars($this->productData['title']) ?></h1>
        <p><?= htmlspecialchars($this->productData['description']) ?></p>
        <?php
    }
    
    private function renderFeaturesSection() {
        ?>
        <h2><i class="fas fa-list-check"></i> Основные характеристики</h2>
        <div class="feature-card">
            <div class="feature-grid">
                <?php foreach ($this->productData['features'] as $feature): ?>
                <div class="feature-item">
                    <span class="feature-icon"><?= $feature['icon'] ?></span>
                    <div>
                        <strong><?= htmlspecialchars($feature['label']) ?>:</strong><br>
                        <?= is_bool($feature['value']) ? 
                            ($feature['value'] ? 'Да' : 'Нет') : 
                            htmlspecialchars($feature['value']) ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderUsageRecommendations() {
        ?>
        <h2><i class="fas fa-home"></i> Рекомендации по использованию</h2>
        <p>Идеально подходит для: 
            <?php foreach ($this->productData['rooms']['suitable'] as $room): ?>
                <span class="tag"><?= htmlspecialchars($room) ?></span>
            <?php endforeach; ?>
        </p>
        <p class="warning">
            <i class="fas fa-exclamation-triangle"></i> 
            Не рекомендуется для: <?= htmlspecialchars($this->productData['rooms']['not_suitable']) ?>
        </p>
        <?php
    }
    
    private function renderDesignFeatures() {
        ?>
        <h2><i class="fas fa-palette"></i> Особенности дизайна</h2>
        <p><?= htmlspecialchars($this->productData['design']['note']) ?></p>
        <p class="note">
            <i class="fas fa-lightbulb"></i> 
            <?= htmlspecialchars($this->productData['design']['tip']) ?>
        </p>
        <?php
    }
    
    private function renderAdditionalInfo() {
        ?>
        <h2><i class="fas fa-info-circle"></i> Дополнительная информация</h2>
        <p><?= htmlspecialchars($this->additionalInfo['certificates']) ?></p>
        <p class="note"><?= htmlspecialchars($this->additionalInfo['color_warning']) ?></p>
        <p><i class="fas fa-phone"></i> <?= htmlspecialchars($this->additionalInfo['contact']) ?></p>
        <?php
    }
    
    private function renderFooter() {
        ?>
        <footer>
            <p>© <?= date('Y') ?> Название компании. Все права защищены.</p>
        </footer>
</body>
</html>
        <?php
    }
}

// Инициализация и отображение страницы
$laminatePage = new LaminateProduct();
$laminatePage->renderProductPage();
?>
<?php
/**
 * Страница с описанием ламината Artens "Сосна канадская светлая"
 * 
 * 
 * 
 */

class LaminateProduct {
    private $productData;
    private $additionalInfo;
    
    public function __construct() {
        $this->initializeProductData();
    }
    
    private function initializeProductData() {
        $this->productData = [
            'title' => 'Ламинат Artens "Сосна канадская светлая"',
            'description' => 'Высококачественное напольное покрытие для жилых и коммерческих помещений с высокой проходимостью. Матовая поверхность с текстурой натуральной древесины.',
            'features' => [
                'class' => ['label' => 'Класс эксплуатации', 'value' => '33 (коммерческое использование)', 'icon' => '🛡️'],
                'material' => ['label' => 'Материал', 'value' => 'ХДФ', 'icon' => '🌳'],
                'surface' => ['label' => 'Поверхность', 'value' => 'Матовая', 'icon' => '✨'],
                'size' => ['label' => 'Размер панели', 'value' => '129,2 × 19,3 см', 'icon' => '📏'],
                'thickness' => ['label' => 'Толщина', 'value' => '8 мм', 'icon' => '📐'],
                'package' => ['label' => 'Панелей в упаковке', 'value' => '8 шт (1,9948 м²)', 'icon' => '📦'],
                'weight' => ['label' => 'Вес упаковки', 'value' => '14,54 кг', 'icon' => '⚖️'],
                'heating' => ['label' => 'Теплый пол', 'value' => 'Допускается до +28°C', 'icon' => '🔥'],
                'country' => ['label' => 'Производство', 'value' => 'Россия', 'icon' => '🇷🇺']
            ],
            'advantages' => [
                'Быстрый монтаж без клея благодаря специальным замкам',
                'Реалистичная текстура натуральной древесины',
                'Высокая устойчивость к механическим повреждениям',
                'Долгий срок службы даже при интенсивной нагрузке'
            ],
            'design' => [
                'note' => 'Передает рисунок древесины с естественными вариациями оттенков и сучков',
                'tip' => 'Чередуйте панели из разных пачек для естественного вида'
            ]
        ];
        
        $this->additionalInfo = [
            'certificates' => 'Актуальные сертификаты доступны при обращении в магазин',
            'color_warning' => 'Цвет на экране может отличаться от реального из-за настроек вашего устройства',
            'contact' => 'Для консультации по монтажу и эксплуатации свяжитесь с нашим специалистом'
        ];
    }
    
    public function renderProductPage() {
        $this->renderHTMLHeader();
        $this->renderProductHeader();
        $this->renderFeaturesSection();
        $this->renderAdvantages();
        $this->renderDesignFeatures();
        $this->renderAdditionalInfo();
        $this->renderFooter();
    }
    
    private function renderHTMLHeader() {
        ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($this->productData['description']) ?>">
    <title><?= htmlspecialchars($this->productData['title']) ?> | Подробное описание</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #e67e22;
            --light-bg: #f9f9f9;
            --text-color: #333;
            --muted-text: #7f8c8d;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }
        
        h1, h2 {
            color: var(--primary-color);
            margin-top: 1.5em;
        }
        
        h1 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }
        
        .feature-card {
            background-color: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        
        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 10px;
        }
        
        .feature-icon {
            font-size: 1.2em;
            margin-top: 3px;
        }
        
        .advantages-list {
            margin: 20px 0;
            padding-left: 20px;
        }
        
        .advantages-list li {
            margin-bottom: 11px;
            position: relative;
            padding-left: 24px;
        }
        
        .advantages-list li:before {
            content: "✓";
            color: var(--accent-color);
            position: absolute;
            left: 0;
            font-weight: bold;
        }
        
        .note {
            font-style: italic;
            color: var(--muted-text);
            border-left: 3px solid var(--muted-text);
            padding-left: 11px;
        }
        
        footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: var(--muted-text);
            font-size: 0.9em;
        }
        
        @media (max-width: 600px) {
            .feature-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
        <?php
    }
    
    private function renderProductHeader() {
        ?>
        <h1><?= htmlspecialchars($this->productData['title']) ?></h1>
        <p><?= htmlspecialchars($this->productData['description']) ?></p>
        <?php
    }
    
    private function renderFeaturesSection() {
        ?>
        <h2><i class="fas fa-list-check"></i> Технические характеристики</h2>
        <div class="feature-card">
            <div class="feature-grid">
                <?php foreach ($this->productData['features'] as $feature): ?>
                <div class="feature-item">
                    <span class="feature-icon"><?= $feature['icon'] ?></span>
                    <div>
                        <strong><?= htmlspecialchars($feature['label']) ?>:</strong><br>
                        <?= is_bool($feature['value']) ? 
                            ($feature['value'] ? 'Да' : 'Нет') : 
                            htmlspecialchars($feature['value']) ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderAdvantages() {
        ?>
        <h2><i class="fas fa-star"></i> Преимущества</h2>
        <ul class="advantages-list">
            <?php foreach ($this->productData['advantages'] as $advantage): ?>
                <li><?= htmlspecialchars($advantage) ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
    
    private function renderDesignFeatures() {
        ?>
        <h2><i class="fas fa-palette"></i> Особенности дизайна</h2>
        <p><?= htmlspecialchars($this->productData['design']['note']) ?></p>
        <p class="note">
            <i class="fas fa-lightbulb"></i> 
            <?= htmlspecialchars($this->productData['design']['tip']) ?>
        </p>
        <?php
    }
    
    private function renderAdditionalInfo() {
        ?>
        <h2><i class="fas fa-info-circle"></i> Дополнительная информация</h2>
        <p><?= htmlspecialchars($this->additionalInfo['certificates']) ?></p>
        <p class="note"><?= htmlspecialchars($this->additionalInfo['color_warning']) ?></p>
        <p><i class="fas fa-phone"></i> <?= htmlspecialchars($this->additionalInfo['contact']) ?></p>
        <?php
    }
    
    private function renderFooter() {
        ?>
        <footer>
            <p>© <?= date('Y') ?> Название компании. Все права защищены.</p>
        </footer>
</body>
</html>
        <?php
    }
}

// Инициализация и отображение страницы
$laminatePage = new LaminateProduct();
$laminatePage->renderProductPage();
?>

<?php
/**
 * Страница с описанием ламината "Дуб Ория"
 * 
 * 
 *
 */

class LaminateProduct {
    private $productData;
    private $additionalInfo;
    
    public function __construct() {
        $this->initializeProductData();
    }
    
    private function initializeProductData() {
        $this->productData = [
            'title' => 'Ламинат "Дуб Ория"',
            'description' => 'Качественное напольное покрытие для жилых и коммерческих помещений с эффектной имитацией натурального дерева. Легкий монтаж и простой уход.',
            'features' => [
                'class' => ['label' => 'Класс износостойкости', 'value' => '33', 'icon' => '🛡️'],
                'panels' => ['label' => 'Плашек в упаковке', 'value' => '8 шт', 'icon' => '📦'],
                'thickness' => ['label' => 'Толщина', 'value' => '8 мм', 'icon' => '📏'],
                'area' => ['label' => 'Площадь покрытия', 'value' => '2.131 м²', 'icon' => '📐'],
                'material' => ['label' => 'Материал', 'value' => 'Древесно-волокнистая плита высокой плотности', 'icon' => '🌳'],
                'surface' => ['label' => 'Поверхность', 'value' => 'Защитное покрытие с декором под дерево', 'icon' => '✨']
            ],
            'advantages' => [
                'Быстрый и простой монтаж',
                'Устойчивость к ударным нагрузкам и истиранию',
                'Гигиеничность - стыки не собирают грязь',
                'Не требует циклевки и полировки',
                'Эффектная имитация натурального дерева',
                'Простота в уходе и обслуживании'
            ],
            'usage' => [
                'Жилые комнаты',
                'Коридоры',
                'Помещения коммерческого назначения'
            ],
            'design' => [
                'note' => 'Передает рисунок древесины с естественными вариациями оттенков и сучков',
                'tip' => 'Чередуйте панели из разных пачек для естественного вида'
            ]
        ];
        
        $this->additionalInfo = [
            'certificates' => 'Сертификаты качества доступны по запросу',
            'color_warning' => 'Изображение на экране может незначительно отличаться от реального цвета',
            'contact' => 'Консультация по подбору и монтажу: +7 (919) 062-05-19'
        ];
    }
    
    public function renderProductPage() {
        $this->renderHTMLHeader();
        $this->renderProductHeader();
        $this->renderFeaturesSection();
        $this->renderUsageSection();
        $this->renderAdvantages();
        $this->renderDesignFeatures();
        $this->renderAdditionalInfo();
        $this->renderFooter();
    }
    
    private function renderHTMLHeader() {
        ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($this->productData['description']) ?>">
    <title><?= htmlspecialchars($this->productData['title']) ?> | Подробное описание</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #5d4037;
            --secondary-color: #8d6e63;
            --accent-color: #a1887f;
            --light-bg: #f5f5f5;
            --text-color: #333;
            --muted-text: #757575;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }
        
        h1, h2 {
            color: var(--primary-color);
            margin-top: 1.5em;
        }
        
        h1 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }
        
        .feature-card {
            background-color: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        
        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 10px;
        }
        
        .feature-icon {
            font-size: 1.2em;
            margin-top: 3px;
            color: var(--secondary-color);
        }
        
        .advantages-list {
            margin: 20px 0;
            padding-left: 20px;
        }
        
        .advantages-list li {
            margin-bottom: 10px;
            position: relative;
            padding-left: 25px;
        }
        
        .advantages-list li:before {
            content: "•";
            color: var(--accent-color);
            position: absolute;
            left: 0;
            font-weight: bold;
            font-size: 1.2em;
        }
        
        .usage-tags {
            margin: 15px 0;
        }
        
        .tag {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.9em;
            margin-right: 8px;
            margin-bottom: 8px;
        }
        
        .note {
            font-style: italic;
            color: var(--muted-text);
            border-left: 3px solid var(--muted-text);
            padding-left: 12px;
            margin: 15px 0;
        }
        
        footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: var(--muted-text);
            font-size: 0.9em;
        }
        
        @media (max-width: 600px) {
            .feature-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
        <?php
    }
    
    private function renderProductHeader() {
        ?>
        <h1><?= htmlspecialchars($this->productData['title']) ?></h1>
        <p><?= htmlspecialchars($this->productData['description']) ?></p>
        <?php
    }
    
    private function renderFeaturesSection() {
        ?>
        <h2><i class="fas fa-ruler-combined"></i> Технические характеристики</h2>
        <div class="feature-card">
            <div class="feature-grid">
                <?php foreach ($this->productData['features'] as $feature): ?>
                <div class="feature-item">
                    <span class="feature-icon"><?= $feature['icon'] ?></span>
                    <div>
                        <strong><?= htmlspecialchars($feature['label']) ?>:</strong><br>
                        <?= is_bool($feature['value']) ? 
                            ($feature['value'] ? 'Да' : 'Нет') : 
                            htmlspecialchars($feature['value']) ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderUsageSection() {
        ?>
        <h2><i class="fas fa-map-marker-alt"></i> Рекомендуемые помещения</h2>
        <div class="usage-tags">
            <?php foreach ($this->productData['usage'] as $room): ?>
                <span class="tag"><?= htmlspecialchars($room) ?></span>
            <?php endforeach; ?>
        </div>
        <?php
    }
    
    private function renderAdvantages() {
        ?>
        <h2><i class="fas fa-award"></i> Преимущества</h2>
        <ul class="advantages-list">
            <?php foreach ($this->productData['advantages'] as $advantage): ?>
                <li><?= htmlspecialchars($advantage) ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
    
    private function renderDesignFeatures() {
        ?>
        <h2><i class="fas fa-paint-brush"></i> Особенности дизайна</h2>
        <p><?= htmlspecialchars($this->productData['design']['note']) ?></p>
        <p class="note">
            <i class="fas fa-info-circle"></i> 
            <?= htmlspecialchars($this->productData['design']['tip']) ?>
        </p>
        <?php
    }
    
    private function renderAdditionalInfo() {
        ?>
        <h2><i class="fas fa-question-circle"></i> Дополнительная информация</h2>
        <p><?= htmlspecialchars($this->additionalInfo['certificates']) ?></p>
        <p class="note"><?= htmlspecialchars($this->additionalInfo['color_warning']) ?></p>
        <p><i class="fas fa-phone-alt"></i> <?= htmlspecialchars($this->additionalInfo['contact']) ?></p>
        <?php
    }
    
    private function renderFooter() {
        ?>
        <footer>
            <p>© <?= date('Y') ?> Все права защищены. Ламинат "Дуб Ория" - качественное напольное покрытие от производителя.</p>
        </footer>
</body>
</html>
        <?php
    }
}

// Инициализация и отображение страницы
$laminatePage = new LaminateProduct();
$laminatePage->renderProductPage();
?>
<?php
/**
 * Страница с описанием хвойной подложки 3 мм
 * 
 * 
 * 
 */

class UnderlayProduct {
    private $productData;
    private $technicalSpecs;
    private $additionalInfo;
    
    public function __construct() {
        $this->initializeProductData();
    }
    
    private function initializeProductData() {
        $this->productData = [
            'title' => 'Звукоизоляционная хвойная подложка 3 мм',
            'description' => 'Профессиональная подложка под напольные покрытия из натуральной хвои. Обеспечивает акустический комфорт, теплоизоляцию и защиту пола.',
            'features' => [
                'thickness' => ['label' => 'Толщина', 'value' => '3 мм', 'icon' => '📏'],
                'area' => ['label' => 'Площадь рулона', 'value' => '7 м²', 'icon' => '📐'],
                'density' => ['label' => 'Плотность', 'value' => '250 кг/м³', 'icon' => '⚖️'],
                'load' => ['label' => 'Нагрузка', 'value' => '15 тонн/м² (PSI)', 'icon' => '🏋️'],
                'material' => ['label' => 'Состав', 'value' => 'Хвойные древесные волокна', 'icon' => '🌲'],
                'lifetime' => ['label' => 'Срок службы', 'value' => '30+ лет', 'icon' => '⏳'],
                'noise_reduction' => ['label' => 'Снижение ударного шума', 'value' => 'ΔIIC 25 dB', 'icon' => '🔇'],
                'thermal_resistance' => ['label' => 'Термосопротивление', 'value' => 'R=0,1 м²·К/Вт', 'icon' => '🌡️']
            ],
            'advantages' => [
                'Устраняет "плавающий" эффект при ходьбе',
                'Защищает замковые соединения от поломки',
                'Выравнивает мелкие неровности основания',
                'Теплоизоляция (λ=0,05 Вт/(м·К))',
                'Предотвращает образование плесени (μ=5)',
                'Совместима с системами "теплый пол"',
                'Эффективная шумоизоляция (до 70%)',
                'Экологичный натуральный материал'
            ],
            'compatibility' => [
                'Ламинат',
                'LVT-плитка',
                'Инженерные полы',
                'Паркетная доска',
                'Все "плавающие" покрытия'
            ],
            'dimensions' => [
                'width' => '590 мм',
                'length' => '790 мм',
                'package' => '1 рулон'
            ]
        ];
        
        $this->technicalSpecs = [
            'acoustic' => [
                'Ударный шум' => 'ΔIIC 25 dB',
                'Воздушный шум' => 'До 70% снижения'
            ],
            'thermal' => [
                'Коэффициент теплопроводности' => 'λ=0,05 Вт/(м·К)',
                'Термическое сопротивление' => 'R=0,1 м²·К/Вт'
            ],
            'moisture' => [
                'Коэффициент сопротивления диффузии' => 'μ=5',
                'Защита от плесени' => 'Да'
            ]
        ];
        
        $this->additionalInfo = [
            'installation' => 'Монтируется встык без нахлестов',
            'warning' => 'Не требует дополнительной пароизоляции',
            'application' => 'Подходит для цокольных этажей и межэтажных перекрытий'
        ];
    }
    
    public function renderProductPage() {
        $this->renderHTMLHeader();
        $this->renderProductHeader();
        $this->renderFeaturesSection();
        $this->renderAdvantages();
        $this->renderCompatibility();
        $this->renderTechnicalSpecs();
        $this->renderAdditionalInfo();
        $this->renderFooter();
    }
    
    private function renderHTMLHeader() {
        ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($this->productData['description']) ?>">
    <title><?= htmlspecialchars($this->productData['title']) ?> | Технические характеристики</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2e7d32;
            --secondary-color: #689f38;
            --accent-color: #8bc34a;
            --light-bg: #f1f8e9;
            --text-color: #263238;
            --muted-text: #546e7a;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            max-width: 1000px;
            margin: 0 auto;
            padding: 25px;
            background-color: #fff;
        }
        
        h1, h2, h3 {
            color: var(--primary-color);
            margin-top: 1.8em;
        }
        
        h1 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 12px;
            margin-bottom: 20px;
        }
        
        h2 {
            border-left: 4px solid var(--accent-color);
            padding-left: 12px;
        }
        
        .feature-card {
            background-color: var(--light-bg);
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px;
            background-color: rgba(255,255,255,0.7);
            border-radius: 6px;
        }
        
        .feature-icon {
            font-size: 1.5em;
            color: var(--secondary-color);
            min-width: 30px;
            text-align: center;
        }
        
        .advantages-list {
            margin: 25px 0;
            padding-left: 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 15px;
        }
        
        .advantages-list li {
            margin-bottom: 12px;
            position: relative;
            padding-left: 35px;
            list-style: none;
        }
        
        .advantages-list li:before {
            content: "✓";
            color: var(--accent-color);
            position: absolute;
            left: 0;
            font-weight: bold;
            font-size: 1.3em;
        }
        
        .compatibility-tags {
            margin: 20px 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .tag {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.95em;
        }
        
        .specs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .specs-card {
            background-color: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
        }
        
        .specs-card h3 {
            margin-top: 0;
            color: var(--secondary-color);
        }
        
        .specs-item {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
        }
        
        .specs-value {
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .note {
            font-style: italic;
            color: var(--muted-text);
            border-left: 3px solid var(--muted-text);
            padding-left: 15px;
            margin: 20px 0;
        }
        
        footer {
            margin-top: 50px;
            padding-top: 25px;
            border-top: 1px solid #e0e0e0;
            color: var(--muted-text);
            font-size: 0.9em;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .feature-grid, .advantages-list, .specs-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
        <?php
    }
    
    private function renderProductHeader() {
        ?>
        <h1><?= htmlspecialchars($this->productData['title']) ?></h1>
        <p><?= htmlspecialchars($this->productData['description']) ?></p>
        <?php
    }
    
    private function renderFeaturesSection() {
        ?>
        <h2><i class="fas fa-ruler"></i> Основные характеристики</h2>
        <div class="feature-card">
            <div class="feature-grid">
                <?php foreach ($this->productData['features'] as $feature): ?>
                <div class="feature-item">
                    <span class="feature-icon"><?= $feature['icon'] ?></span>
                    <div>
                        <strong><?= htmlspecialchars($feature['label']) ?>:</strong>
                        <span><?= htmlspecialchars($feature['value']) ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderAdvantages() {
        ?>
        <h2><i class="fas fa-check-circle"></i> Преимущества хвойной подложки</h2>
        <ul class="advantages-list">
            <?php foreach ($this->productData['advantages'] as $advantage): ?>
                <li><?= htmlspecialchars($advantage) ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
    
    private function renderCompatibility() {
        ?>
        <h2><i class="fas fa-layer-group"></i> Совместимость с покрытиями</h2>
        <div class="compatibility-tags">
            <?php foreach ($this->productData['compatibility'] as $item): ?>
                <span class="tag"><?= htmlspecialchars($item) ?></span>
            <?php endforeach; ?>
        </div>
        <p>Размеры листа: <?= htmlspecialchars($this->productData['dimensions']['width']) ?> × <?= htmlspecialchars($this->productData['dimensions']['length']) ?></p>
        <?php
    }
    
    private function renderTechnicalSpecs() {
        ?>
        <h2><i class="fas fa-microscope"></i> Технические параметры</h2>
        <div class="specs-grid">
            <div class="specs-card">
                <h3><i class="fas fa-volume-off"></i> Акустические свойства</h3>
                <?php foreach ($this->technicalSpecs['acoustic'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-temperature-low"></i> Теплоизоляция</h3>
                <?php foreach ($this->technicalSpecs['thermal'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-tint"></i> Влагостойкость</h3>
                <?php foreach ($this->technicalSpecs['moisture'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderAdditionalInfo() {
        ?>
        <h2><i class="fas fa-info-circle"></i> Дополнительная информация</h2>
        <p><?= htmlspecialchars($this->additionalInfo['installation']) ?></p>
        <p class="note">
            <i class="fas fa-exclamation-triangle"></i> 
            <?= htmlspecialchars($this->additionalInfo['warning']) ?>
        </p>
        <p><?= htmlspecialchars($this->additionalInfo['application']) ?></p>
        <?php
    }
    
    private function renderFooter() {
        ?>
        <footer>
            <p>© <?= date('Y') ?> Хвойная подложка 3 мм. Натуральный экологичный материал для профессионального монтажа.</p>
        </footer>
</body>
</html>
        <?php
    }
}

// Инициализация и отображение страницы

$underlayPage = new UnderlayProduct();
$underlayPage->renderProductPage();
?>
<?php
/**
 * Страница с описанием винтовой лестницы "Калгари"
 * 
 * 
 * 
 */

class StairProduct {
    private $productData;
    private $technicalSpecs;
    private $additionalInfo;
    
    public function __construct() {
        $this->initializeProductData();
    }
    
    private function initializeProductData() {
        $this->productData = [
            'title' => 'Винтовая лестница "Калгари"',
            'description' => 'Компактная и эргономичная лестница из светлого бука с лакированными ступенями. Универсальное решение для современных интерьеров.',
            'features' => [
                'material' => ['label' => 'Материал ступеней', 'value' => 'Бук мультиплекс, лакированный', 'icon' => '🌳'],
                'color' => ['label' => 'Цвет', 'value' => 'Светлый натуральный', 'icon' => '🎨'],
                'load' => ['label' => 'Нагрузка на ступень', 'value' => '234 кг', 'icon' => '🏋️'],
                'step' => ['label' => 'Шаг ступеней', 'value' => 'От 204 см (регулируемый)', 'icon' => '📏'],
                'handrail' => ['label' => 'Поручень', 'value' => 'Цельный', 'icon' => '👐'],
                'mounting' => ['label' => 'Варианты монтажа', 'value' => 'По/против часовой стрелки', 'icon' => '🔄'],
                'opening' => ['label' => 'Тип проёма', 'value' => 'Круглый или квадратный', 'icon' => '⏺️'],
                'package' => ['label' => 'Комплектация', 'value' => 'Все детали в одной коробке', 'icon' => '📦']
            ],
            'advantages' => [
                'Компактность и экономия пространства',
                'Современный лаконичный дизайн',
                'Универсальность для любого интерьера',
                'Продуманная эргономика',
                'Регулируемый шаг ступеней',
                'Не требует дополнительных покупок',
                'Простота установки',
                'Надежность и долговечность'
            ],
            'dimensions' => [
                'diameter' => 'Зависит от конфигурации',
                'height' => 'Регулируется под этаж',
                'weight' => 'Более 25 кг (требуется 2 человека для переноса)'
            ]
        ];
        
        $this->technicalSpecs = [
            'construction' => [
                'Тип конструкции' => 'Винтовая',
                'Материал каркаса' => 'Металл с порошковым покрытием',
                'Отделка' => 'Лак на водной основе'
            ],
            'safety' => [
                'Максимальная нагрузка' => '234 кг на ступень',
                'Угол подъема' => 'Комфортный для передвижения',
                'Высота перил' => 'Стандартная 90-100 см'
            ],
            'installation' => [
                'Время монтажа' => '4-6 часов',
                'Необходимые инструменты' => 'Базовый набор',
                'Дополнительные элементы' => 'Не требуются'
            ]
        ];
        
        $this->additionalInfo = [
            'warning' => 'Товар весом более 25 кг необходимо перемещать минимум двумя людьми или с помощью механизированного оборудования',
            'delivery' => 'Доставляется в полной комплектации',
            'warranty' => 'Гарантия 24 месяца'
        ];
    }
    
    public function renderProductPage() {
        $this->renderHTMLHeader();
        $this->renderProductHeader();
        $this->renderFeaturesSection();
        $this->renderAdvantages();
        $this->renderTechnicalSpecs();
        $this->renderGallerySection();
        $this->renderAdditionalInfo();
        $this->renderFooter();
    }
    
    private function renderHTMLHeader() {
        ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($this->productData['description']) ?>">
    <title><?= htmlspecialchars($this->productData['title']) ?> | Подробное описание</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #5d4037;
            --secondary-color: #8d6e63;
            --accent-color: #d7ccc8;
            --light-bg: #efebe9;
            --text-color: #3e2723;
            --muted-text: #6d4c41;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
        }
        
        h1, h2, h3 {
            color: var(--primary-color);
            margin-top: 1.8em;
        }
        
        h1 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 15px;
            margin-bottom: 24px;
        }
        
        h2 {
            border-left: 5px solid var(--secondary-color);
            padding-left: 14px;
            margin: 35px 0 20px;
        }
        
        .feature-card {
            background-color: var(--light-bg);
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 15px;
            background-color: rgba(255,255,255,0.8);
            border-radius: 8px;
            transition: transform 0.3s;
        }
        
        .feature-item:hover {
            transform: translateY(-3px);
        }
        
        .feature-icon {
            font-size: 1.8em;
            color: var(--secondary-color);
            min-width: 40px;
            text-align: center;
        }
        
        .advantages-list {
            margin: 30px 0;
            padding-left: 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }
        
        .advantages-list li {
            margin-bottom: 15px;
            position: relative;
            padding-left: 40px;
            list-style: none;
            font-size: 1.05em;
        }
        
        .advantages-list li:before {
            content: "•";
            color: var(--secondary-color);
            position: absolute;
            left: 0;
            font-weight: bold;
            font-size: 1.8em;
            line-height: 0.9;
        }
        
        .specs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        
        .specs-card {
            background-color: var(--light-bg);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.05);
        }
        
        .specs-card h3 {
            margin-top: 0;
            color: var(--secondary-color);
            border-bottom: 1px dashed var(--secondary-color);
            padding-bottom: 10px;
        }
        
        .specs-item {
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dotted #d7ccc8;
        }
        
        .specs-value {
            font-weight: bold;
            color: var(--primary-color);
            text-align: right;
        }
        
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        
        .gallery-item {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
            height: 200px;
            background-color: #f5f5f5;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        
        .gallery-item:hover img {
            transform: scale(1.05);
        }
        
        .warning {
            background-color: #ffebee;
            color: #c62828;
            padding: 20px;
            border-radius: 8px;
            border-left: 5px solid #c62828;
            margin: 30px 0;
            font-weight: 500;
        }
        
        .dimensions-box {
            background-color: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
        }
        
        footer {
            margin-top: 60px;
            padding-top: 30px;
            border-top: 1px solid #d7ccc8;
            color: var(--muted-text);
            font-size: 0.95em;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .feature-grid, .advantages-list, .specs-grid, .gallery {
                grid-template-columns: 1fr;
            }
            
            body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
        <?php
    }
    
    private function renderProductHeader() {
        ?>
        <h1><?= htmlspecialchars($this->productData['title']) ?></h1>
        <p style="font-size: 1.1em;"><?= htmlspecialchars($this->productData['description']) ?></p>
        <?php
    }
    
    private function renderFeaturesSection() {
        ?>
        <h2><i class="fas fa-cogs"></i> Основные характеристики</h2>
        <div class="feature-card">
            <div class="feature-grid">
                <?php foreach ($this->productData['features'] as $feature): ?>
                <div class="feature-item">
                    <span class="feature-icon"><?= $feature['icon'] ?></span>
                    <div>
                        <strong><?= htmlspecialchars($feature['label']) ?>:</strong><br>
                        <?= htmlspecialchars($feature['value']) ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="dimensions-box">
                <h3 style="margin-top: 0;"><i class="fas fa-ruler-combined"></i> Габариты:</h3>
                <p><strong>Диаметр:</strong> <?= htmlspecialchars($this->productData['dimensions']['diameter']) ?></p>
                <p><strong>Высота:</strong> <?= htmlspecialchars($this->productData['dimensions']['height']) ?></p>
                <p><strong>Вес:</strong> <?= htmlspecialchars($this->productData['dimensions']['weight']) ?></p>
            </div>
        </div>
        <?php
    }
    
    private function renderAdvantages() {
        ?>
        <h2><i class="fas fa-star"></i> Преимущества лестницы "Калгари"</h2>
        <ul class="advantages-list">
            <?php foreach ($this->productData['advantages'] as $advantage): ?>
                <li><?= htmlspecialchars($advantage) ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
    
    private function renderTechnicalSpecs() {
        ?>
        <h2><i class="fas fa-clipboard-list"></i> Технические параметры</h2>
        <div class="specs-grid">
            <div class="specs-card">
                <h3><i class="fas fa-cube"></i> Конструкция</h3>
                <?php foreach ($this->technicalSpecs['construction'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-shield-alt"></i> Безопасность</h3>
                <?php foreach ($this->technicalSpecs['safety'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-tools"></i> Монтаж</h3>
                <?php foreach ($this->technicalSpecs['installation'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderGallerySection() {
        ?>
        <h2><i class="fas fa-images"></i> Примеры установки</h2>
        <div class="gallery">
            <div class="gallery-item">
                <img src="https://example.com/stairs1.jpg" alt="Лестница Калгари в интерьере">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/stairs2.jpg" alt="Детали лестницы">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/stairs3.jpg" alt="Лестница в квадратном проёме">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/stairs4.jpg" alt="Общий вид лестницы">
            </div>
        </div>
        <?php
    }
    
    private function renderAdditionalInfo() {
        ?>
        <div class="warning">
            <i class="fas fa-exclamation-triangle"></i> 
            <?= htmlspecialchars($this->additionalInfo['warning']) ?>
        </div>
        
        <p><i class="fas fa-truck"></i> <?= htmlspecialchars($this->additionalInfo['delivery']) ?></p>
        <p><i class="fas fa-certificate"></i> <?= htmlspecialchars($this->additionalInfo['warranty']) ?></p>
        <?php
    }
    
    private function renderFooter() {
        ?>
        <footer>
            <p>© <?= date('Y') ?> Винтовая лестница "Калгари" - идеальное решение для современного дома.</p>
        </footer>
</body>
</html>
        <?php
    }
}

// Инициализация и отображение страницы
$stairPage = new StairProduct();
$stairPage->renderProductPage();
?>
<?php
/**
 * Страница с описанием лестницы "Лес-91"
 * 
 * 
 *
 */

class ForestStairProduct {
    private $productData;
    private $technicalSpecs;
    private $additionalInfo;
    
    public function __construct() {
        $this->initializeProductData();
    }
    
    private function initializeProductData() {
        $this->productData = [
            'title' => 'Лестница "Лес-91"',
            'description' => 'Компактная самонесущая лестница для дачи или загородного дома из натуральной хвойной древесины. Идеальное решение для мансарды или второго этажа.',
            'features' => [
                'material' => ['label' => 'Материал', 'value' => 'Хвойная древесина', 'icon' => '🌲'],
                'type' => ['label' => 'Тип', 'value' => 'Полувинтовая', 'icon' => '🌀'],
                'mounting' => ['label' => 'Монтаж', 'value' => 'Лево- и правозаходная', 'icon' => ↔️'],
                'rails' => ['label' => 'Перила', 'value' => 'Лаконичные на нижнем пролете', 'icon' => '🖐️'],
                'location' => ['label' => 'Размещение', 'value' => 'Закрытые помещения', 'icon' => '🏠'],
                'package' => ['label' => 'Комплектация', 'value' => 'Готовый к установке комплект', 'icon' => '📦'],
                'weight' => ['label' => 'Вес', 'value' => 'Более 25 кг', 'icon' => '🏋️']
            ],
            'advantages' => [
                'Существенная экономия средств',
                'Быстрая установка без дополнительных работ',
                'Компактность для небольших помещений',
                'Экологичный натуральный материал',
                'Универсальность монтажа (левый/правый заход)',
                'Готовая к установке конструкция',
                'Прочность и надежность',
                'Эстетичный лаконичный дизайн'
            ],
            'specifications' => [
                'Высота' => 'Подходит для стандартных этажей',
                'Ширина марша' => 'Компактная, оптимальная для дач',
                'Угол наклона' => 'Комфортный для подъема',
                'Отделка' => 'Натуральная древесина без покраски'
            ]
        ];
        
        $this->technicalSpecs = [
            'construction' => [
                'Тип конструкции' => 'Самонесущая полувинтовая',
                'Количество ступеней' => 'Зависит от высоты этажа',
                'Соединения' => 'Надежные крепления'
            ],
            'safety' => [
                'Предельная нагрузка' => 'До 150 кг',
                'Перила' => 'На нижнем пролете',
                'Поверхность ступеней' => 'Противоскользящая'
            ],
            'installation' => [
                'Время монтажа' => '2-4 часа',
                'Необходимые инструменты' => 'Базовый набор',
                'Дополнительные элементы' => 'Не требуются'
            ]
        ];
        
        $this->additionalInfo = [
            'warning' => 'Товар весом более 25 кг необходимо перемещать минимум двумя людьми или с помощью механизированного оборудования',
            'recommendation' => 'Рекомендуется для сезонного использования на дачах',
            'protection' => 'Не требует специального ухода'
        ];
    }
    
    public function renderProductPage() {
        $this->renderHTMLHeader();
        $this->renderProductHeader();
        $this->renderFeaturesSection();
        $this->renderAdvantages();
        $this->renderTechnicalSpecs();
        $this->renderGallerySection();
        $this->renderAdditionalInfo();
        $this->renderFooter();
    }
    
    private function renderHTMLHeader() {
        ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($this->productData['description']) ?>">
    <title><?= htmlspecialchars($this->productData['title']) ?> | Описание</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e342e;
            --secondary-color: #795548;
            --accent-color: #a1887f;
            --light-bg: #efebe9;
            --text-color: #3e2723;
            --muted-text: #5d4037;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
        }
        
        h1, h2, h3 {
            color: var(--primary-color);
            margin-top: 1.8em;
        }
        
        h1 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        
        h2 {
            border-left: 5px solid var(--secondary-color);
            padding-left: 15px;
            margin: 35px 0 20px;
        }
        
        .feature-card {
            background-color: var(--light-bg);
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 15px;
            background-color: rgba(255,255,255,0.8);
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .feature-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            font-size: 1.8em;
            color: var(--secondary-color);
            min-width: 40px;
            text-align: center;
        }
        
        .advantages-list {
            margin: 30px 0;
            padding-left: 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }
        
        .advantages-list li {
            margin-bottom: 15px;
            position: relative;
            padding-left: 40px;
            list-style: none;
            font-size: 1.05em;
        }
        
        .advantages-list li:before {
            content: "✓";
            color: var(--secondary-color);
            position: absolute;
            left: 0;
            font-weight: bold;
            font-size: 1.5em;
        }
        
        .specs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        
        .specs-card {
            background-color: var(--light-bg);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.05);
        }
        
        .specs-card h3 {
            margin-top: 0;
            color: var(--secondary-color);
            border-bottom: 1px dashed var(--secondary-color);
            padding-bottom: 10px;
        }
        
        .specs-item {
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dotted var(--accent-color);
        }
        
        .specs-value {
            font-weight: bold;
            color: var(--primary-color);
            text-align: right;
        }
        
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        
        .gallery-item {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
            height: 200px;
            background-color: #f5f5f5;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        
        .gallery-item:hover img {
            transform: scale(1.05);
        }
        
        .warning {
            background-color: #ffebee;
            color: #c62828;
            padding: 20px;
            border-radius: 8px;
            border-left: 5px solid #c62828;
            margin: 30px 0;
            font-weight: 500;
        }
        
        .specs-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
        }
        
        .specs-table th {
            background-color: var(--secondary-color);
            color: white;
            text-align: left;
            padding: 12px;
        }
        
        .specs-table td {
            padding: 12px;
            border-bottom: 1px solid var(--accent-color);
        }
        
        .specs-table tr:nth-child(even) {
            background-color: var(--light-bg);
        }
        
        footer {
            margin-top: 60px;
            padding-top: 30px;
            border-top: 1px solid var(--accent-color);
            color: var(--muted-text);
            font-size: 0.95em;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .feature-grid, .advantages-list, .specs-grid, .gallery {
                grid-template-columns: 1fr;
            }
            
            body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
        <?php
    }
    
    private function renderProductHeader() {
        ?>
        <h1><?= htmlspecialchars($this->productData['title']) ?></h1>
        <p style="font-size: 1.1em;"><?= htmlspecialchars($this->productData['description']) ?></p>
        <?php
    }
    
    private function renderFeaturesSection() {
        ?>
        <h2><i class="fas fa-info-circle"></i> Основные характеристики</h2>
        <div class="feature-card">
            <div class="feature-grid">
                <?php foreach ($this->productData['features'] as $feature): ?>
                <div class="feature-item">
                    <span class="feature-icon"><?= $feature['icon'] ?></span>
                    <div>
                        <strong><?= htmlspecialchars($feature['label']) ?>:</strong><br>
                        <?= htmlspecialchars($feature['value']) ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <h3 style="margin-top: 30px;"><i class="fas fa-ruler-combined"></i> Технические параметры</h3>
            <table class="specs-table">
                <?php foreach ($this->productData['specifications'] as $param => $value): ?>
                <tr>
                    <td><?= htmlspecialchars($param) ?></td>
                    <td><strong><?= htmlspecialchars($value) ?></strong></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php
    }
    
    private function renderAdvantages() {
        ?>
        <h2><i class="fas fa-check-double"></i> Преимущества модели "Лес-91"</h2>
        <ul class="advantages-list">
            <?php foreach ($this->productData['advantages'] as $advantage): ?>
                <li><?= htmlspecialchars($advantage) ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
    
    private function renderTechnicalSpecs() {
        ?>
        <h2><i class="fas fa-clipboard-check"></i> Технические особенности</h2>
        <div class="specs-grid">
            <div class="specs-card">
                <h3><i class="fas fa-cube"></i> Конструкция</h3>
                <?php foreach ($this->technicalSpecs['construction'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-shield-alt"></i> Безопасность</h3>
                <?php foreach ($this->technicalSpecs['safety'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-tools"></i> Монтаж</h3>
                <?php foreach ($this->technicalSpecs['installation'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderGallerySection() {
        ?>
        <h2><i class="fas fa-camera"></i> Примеры установки</h2>
        <div class="gallery">
            <div class="gallery-item">
                <img src="https://example.com/forest1.jpg" alt="Лестница Лес-91 в интерьере дачи">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/forest2.jpg" alt="Детали конструкции">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/forest3.jpg" alt="Полувинтовая форма">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/forest4.jpg" alt="Перила нижнего пролета">
            </div>
        </div>
        <?php
    }
    
    private function renderAdditionalInfo() {
        ?>
        <div class="warning">
            <i class="fas fa-exclamation-triangle"></i> 
            <?= htmlspecialchars($this->additionalInfo['warning']) ?>
        </div>
        
        <p><i class="fas fa-home"></i> <?= htmlspecialchars($this->additionalInfo['recommendation']) ?></p>
        <p><i class="fas fa-leaf"></i> <?= htmlspecialchars($this->additionalInfo['protection']) ?></p>
        <?php
    }
    
    private function renderFooter() {
        ?>
        <footer>
            <p>© <?= date('Y') ?> Лестница "Лес-91" - практичное решение для загородного дома.</p>
        </footer>
</body>
</html>
        <?php
    }
}

// Инициализация и отображение страницы
$stairPage = new ForestStairProduct();
$stairPage->renderProductPage();
?>
<?php
/**
 * Страница с описанием чердачной лестницы Dolle HOBBY 26
 * 
 * 
 * 
 */

class AtticLadderProduct {
    private $productData;
    private $technicalSpecs;
    private $additionalFeatures;
    
    public function __construct() {
        $this->initializeProductData();
    }
    
    private function initializeProductData() {
        $this->productData = [
            'title' => 'Чердачная лестница Dolle HOBBY 26 120x60 см',
            'description' => 'Функциональная складная конструкция для удобного доступа на чердак с теплоизолированным люком и безопасными ступенями.',
            'productCode' => '5004601',
            'features' => [
                'type' => ['label' => 'Тип', 'value' => 'Складная чердачная', 'icon' => '🪜'],
                'sections' => ['label' => 'Секции', 'value' => '3 складные', 'icon' => '🔗'],
                'load' => ['label' => 'Нагрузка', 'value' => '150 кг', 'icon' => '🏋️'],
                'angle' => ['label' => 'Угол наклона', 'value' => '60°', 'icon' => '📐'],
                'material' => ['label' => 'Материал', 'value' => 'Дерево', 'icon' => '🌲'],
                'steps' => ['label' => 'Ступени', 'value' => 'Нескользящие деревянные', 'icon' => '👣'],
                'hatch' => ['label' => 'Люк', 'value' => 'С теплоизоляцией', 'icon' => '🚪'],
                'extension' => ['label' => 'Наращивание', 'value' => 'Возможно добавление секций', 'icon' => '➕']
            ],
            'dimensions' => [
                'closed' => ['label' => 'В сложенном виде', 'value' => '120×60 см'],
                'opened' => ['label' => 'В разложенном виде', 'value' => 'Длина 164.5 см'],
                'box' => ['label' => 'Короб конструкции', 'value' => '1175×115×576 мм']
            ],
            'advantages' => [
                'Компактность в сложенном состоянии',
                'Надежная блокировка в поднятом положении',
                'Теплоизоляция чердачного люка',
                'Безопасные нескользящие ступени',
                'Возможность покраски под интерьер',
                'Прочная деревянная конструкция',
                'Возможность наращивания высоты',
                'Легкий и удобный доступ на чердак'
            ]
        ];
        
        $this->technicalSpecs = [
            'construction' => [
                'Тип конструкции' => '3-секционная складная',
                'Механизм открывания' => 'Плавный, с пружинами',
                'Блокировка' => 'Крюк в поднятом состоянии'
            ],
            'materials' => [
                'Основной материал' => 'Качественная древесина',
                'Ступени' => 'Шероховатая поверхность',
                'Уплотнитель' => 'Теплоизоляция по периметру'
            ],
            'installation' => [
                'Рекомендуемая высота' => 'До 2.8 м',
                'Время монтажа' => '2-3 часа',
                'Дополнительные секции' => 'Доступны для покупки'
            ]
        ];
        
        $this->additionalFeatures = [
            'safety' => 'Ступени с противоскользящим покрытием',
            'customization' => 'Возможность покраски в любой цвет',
            'thermal' => 'Теплоизоляция люка предотвращает потери тепла',
            'space' => 'Не занимает место в сложенном состоянии'
        ];
    }
    
    public function renderProductPage() {
        $this->renderHTMLHeader();
        $this->renderProductHeader();
        $this->renderFeaturesSection();
        $this->renderDimensions();
        $this->renderAdvantages();
        $this->renderTechnicalSpecs();
        $this->renderAdditionalFeatures();
        $this->renderGallerySection();
        $this->renderFooter();
    }
    
    private function renderHTMLHeader() {
        ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($this->productData['description']) ?>">
    <title><?= htmlspecialchars($this->productData['title']) ?> | Описание</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #5d4037;
            --secondary-color: #8d6e63;
            --accent-color: #d7ccc8;
            --light-bg: #efebe9;
            --text-color: #3e2723;
            --muted-text: #6d4c41;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
        }
        
        h1, h2, h3 {
            color: var(--primary-color);
            margin-top: 1.8em;
        }
        
        h1 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        
        h2 {
            border-left: 5px solid var(--secondary-color);
            padding-left: 15px;
            margin: 35px 0 20px;
        }
        
        .product-code {
            background-color: var(--light-bg);
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.9em;
            color: var(--muted-text);
        }
        
        .feature-card {
            background-color: var(--light-bg);
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 15px;
            background-color: rgba(255,255,255,0.8);
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .feature-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            font-size: 1.8em;
            color: var(--secondary-color);
            min-width: 40px;
            text-align: center;
        }
        
        .dimensions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .dimension-card {
            background-color: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
        }
        
        .dimension-value {
            font-size: 1.2em;
            font-weight: bold;
            color: var(--primary-color);
            margin-top: 5px;
        }
        
        .advantages-list {
            margin: 30px 0;
            padding-left: 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }
        
        .advantages-list li {
            margin-bottom: 15px;
            position: relative;
            padding-left: 40px;
            list-style: none;
            font-size: 1.05em;
        }
        
        .advantages-list li:before {
            content: "•";
            color: var(--secondary-color);
            position: absolute;
            left: 0;
            font-weight: bold;
            font-size: 1.8em;
            line-height: 0.9;
        }
        
        .specs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        
        .specs-card {
            background-color: var(--light-bg);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.05);
        }
        
        .specs-card h3 {
            margin-top: 0;
            color: var(--secondary-color);
            border-bottom: 1px dashed var(--secondary-color);
            padding-bottom: 10px;
        }
        
        .specs-item {
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dotted var(--accent-color);
        }
        
        .specs-value {
            font-weight: bold;
            color: var(--primary-color);
            text-align: right;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        
        .feature-box {
            background-color: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .feature-box i {
            font-size: 1.5em;
            color: var(--secondary-color);
        }
        
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        
        .gallery-item {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
            height: 200px;
            background-color: #f5f5f5;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        
        .gallery-item:hover img {
            transform: scale(1.05);
        }
        
        footer {
            margin-top: 60px;
            padding-top: 30px;
            border-top: 1px solid var(--accent-color);
            color: var(--muted-text);
            font-size: 0.95em;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .feature-grid, .dimensions-grid, .advantages-list, 
            .specs-grid, .features-grid, .gallery {
                grid-template-columns: 1fr;
            }
            
            body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
        <?php
    }
    
    private function renderProductHeader() {
        ?>
        <h1><?= htmlspecialchars($this->productData['title']) ?></h1>
        <p style="font-size: 1.1em;"><?= htmlspecialchars($this->productData['description']) ?></p>

        <?php
    }
    
    private function renderFeaturesSection() {
        ?>
        <h2><i class="fas fa-info-circle"></i> Основные характеристики</h2>
        <div class="feature-card">
            <div class="feature-grid">
                <?php foreach ($this->productData['features'] as $feature): ?>
                <div class="feature-item">
                    <span class="feature-icon"><?= $feature['icon'] ?></span>
                    <div>
                        <strong><?= htmlspecialchars($feature['label']) ?>:</strong><br>
                        <?= htmlspecialchars($feature['value']) ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderDimensions() {
        ?>
        <h2><i class="fas fa-ruler-combined"></i> Габариты</h2>
        <div class="dimensions-grid">
            <?php foreach ($this->productData['dimensions'] as $dimension): ?>
            <div class="dimension-card">
                <h3 style="margin-top: 0;"><?= htmlspecialchars($dimension['label']) ?></h3>
                <div class="dimension-value"><?= htmlspecialchars($dimension['value']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
    
    private function renderAdvantages() {
        ?>
        <h2><i class="fas fa-check-double"></i> Преимущества</h2>
        <ul class="advantages-list">
            <?php foreach ($this->productData['advantages'] as $advantage): ?>
                <li><?= htmlspecialchars($advantage) ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
    
    private function renderTechnicalSpecs() {
        ?>
        <h2><i class="fas fa-clipboard-list"></i> Технические характеристики</h2>
        <div class="specs-grid">
            <div class="specs-card">
                <h3><i class="fas fa-cube"></i> Конструкция</h3>
                <?php foreach ($this->technicalSpecs['construction'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-tree"></i> Материалы</h3>
                <?php foreach ($this->technicalSpecs['materials'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-tools"></i> Установка</h3>
                <?php foreach ($this->technicalSpecs['installation'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderAdditionalFeatures() {
        ?>
        <h2><i class="fas fa-star"></i> Дополнительные особенности</h2>
        <div class="features-grid">
            <div class="feature-box">
                <i class="fas fa-safety-boot"></i>
                <div>
                    <h3 style="margin: 0 0 5px 0;">Безопасность</h3>
                    <p><?= htmlspecialchars($this->additionalFeatures['safety']) ?></p>
                </div>
            </div>
            <div class="feature-box">
                <i class="fas fa-paint-brush"></i>
                <div>
                    <h3 style="margin: 0 0 5px 0;">Индивидуальный дизайн</h3>
                    <p><?= htmlspecialchars($this->additionalFeatures['customization']) ?></p>
                </div>
            </div>
            <div class="feature-box">
                <i class="fas fa-temperature-low"></i>
                <div>
                    <h3 style="margin: 0 0 5px 0;">Теплоизоляция</h3>
                    <p><?= htmlspecialchars($this->additionalFeatures['thermal']) ?></p>
                </div>
            </div>
            <div class="feature-box">
                <i class="fas fa-arrows-alt-v"></i>
                <div>
                    <h3 style="margin: 0 0 5px 0;">Экономия пространства</h3>
                    <p><?= htmlspecialchars($this->additionalFeatures['space']) ?></p>
                </div>
            </div>
        </div>
        <?php
    }
    
    private function renderGallerySection() {
        ?>
        <h2><i class="fas fa-images"></i> Галерея</h2>
        <div class="gallery">
            <div class="gallery-item">
                <img src="https://example.com/dolle-closed.jpg" alt="Лестница в сложенном состоянии">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/dolle-opened.jpg" alt="Лестница в разложенном виде">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/dolle-steps.jpg" alt="Нескользящие ступени">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/dolle-hatch.jpg" alt="Теплоизолированный люк">
            </div>
        </div>
        <?php
    }
    
    private function renderFooter() {
        ?>
        <footer>
            <p>© <?= date('Y') ?> Чердачная лестница Dolle HOBBY 26 - удобный доступ на чердак с экономией пространства.</p>
        </footer>
</body>
</html>
        <?php
    }
}

// Инициализация и отображение страницы
$ladderPage = new AtticLadderProduct();
$ladderPage->renderProductPage();
?>
<?php
/**
 * Страница с описанием дюбеля с грибовидной головкой
 * 
 * 
 * 
 */

class MushroomDowelsProduct {
    private $productData;
    private $technicalSpecs;
    private $usageInfo;
    
    public function __construct() {
        $this->initializeProductData();
    }
    
    private function initializeProductData() {
        $this->productData = [
            'title' => 'Дюбель с грибовидной головкой 6×40 мм',
            'description' => 'Надежный крепежный элемент для плотных оснований с удобной грибовидной манжетой, предотвращающей проваливание.',
            'features' => [
                'head' => ['label' => 'Тип головки', 'value' => 'Грибовидная манжета', 'icon' => '🍄'],
                'material' => ['label' => 'Материал', 'value' => 'Полипропилен', 'icon' => '🧪'],
                'size' => ['label' => 'Размер', 'value' => '6×40 мм', 'icon' => '📏'],
                'quantity' => ['label' => 'Количество', 'value' => '100 шт в комплекте', 'icon' => '🧮'],
                'mounting' => ['label' => 'Монтаж', 'value' => 'Легкий', 'icon' => '🔨'],
                'removal' => ['label' => 'Демонтаж', 'value' => 'Простой', 'icon' => '🔄'],
                'durability' => ['label' => 'Срок службы', 'value' => 'Долговечный', 'icon' => '⏳']
            ],
            'advantages' => [
                'Предотвращает проваливание в отверстие',
                'Легко извлекается при необходимости',
                'Надежное крепление в плотных основаниях',
                'Устойчивость к коррозии',
                'Широкая манжета распределяет нагрузку',
                'Подходит для многократного использования',
                'Экономичная упаковка 100 шт',
                'Универсальное применение'
            ],
            'dimensions' => [
                'diameter' => '6 мм',
                'length' => '40 мм',
                'head_diameter' => '12 мм (грибовидная часть)'
            ]
        ];
        
        $this->technicalSpecs = [
            'materials' => [
                'Основной материал' => 'Полипропилен',
                'Цвет' => 'Стандартный белый',
                'Температурный диапазон' => 'От -20°C до +80°C'
            ],
            'compatibility' => [
                'Бетон' => 'Оптимально',
                'Полнотелый кирпич' => 'Рекомендуется',
                'Газобетон' => 'Не рекомендуется',
                'Гипсокартон' => 'Не подходит'
            ],
            'characteristics' => [
                'Минимальная глубина отверстия' => '45 мм',
                'Рекомендуемый диаметр сверла' => '6 мм',
                'Максимальная нагрузка' => 'Зависит от основания'
            ]
        ];
        
        $this->usageInfo = [
            'step1' => 'Просверлить отверстие диаметром 6 мм на глубину 45 мм',
            'step2' => 'Очистить отверстие от пыли',
            'step3' => 'Вставить дюбель до упора грибовидной головкой',
            'step4' => 'Завернуть шуруп или винт',
            'warning' => 'Не использовать в рыхлых или хрупких материалах'
        ];
    }
    
    public function renderProductPage() {
        $this->renderHTMLHeader();
        $this->renderProductHeader();
        $this->renderFeaturesSection();
        $this->renderAdvantages();
        $this->renderTechnicalSpecs();
        $this->renderUsageInstructions();
        $this->renderGallerySection();
        $this->renderFooter();
    }
    
    private function renderHTMLHeader() {
        ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($this->productData['description']) ?>">
    <title><?= htmlspecialchars($this->productData['title']) ?> | Технические характеристики</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #455a64;
            --secondary-color: #607d8b;
            --accent-color: #b0bec5;
            --light-bg: #eceff1;
            --text-color: #263238;
            --muted-text: #546e7a;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
        }
        
        h1, h2, h3 {
            color: var(--primary-color);
            margin-top: 1.8em;
        }
        
        h1 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        
        h2 {
            border-left: 5px solid var(--secondary-color);
            padding-left: 15px;
            margin: 35px 0 20px;
        }
        
        .feature-card {
            background-color: var(--light-bg);
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 15px;
            background-color: rgba(255,255,255,0.8);
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .feature-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            font-size: 1.8em;
            color: var(--secondary-color);
            min-width: 40px;
            text-align: center;
        }
        
        .advantages-list {
            margin: 30px 0;
            padding-left: 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }
        
        .advantages-list li {
            margin-bottom: 15px;
            position: relative;
            padding-left: 40px;
            list-style: none;
            font-size: 1.05em;
        }
        
        .advantages-list li:before {
            content: "•";
            color: var(--secondary-color);
            position: absolute;
            left: 0;
            font-weight: bold;
            font-size: 1.8em;
            line-height: 0.9;
        }
        
        .specs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        
        .specs-card {
            background-color: var(--light-bg);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.05);
        }
        
        .specs-card h3 {
            margin-top: 0;
            color: var(--secondary-color);
            border-bottom: 1px dashed var(--secondary-color);
            padding-bottom: 10px;
        }
        
        .specs-item {
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dotted var(--accent-color);
        }
        
        .specs-value {
            font-weight: bold;
            color: var(--primary-color);
            text-align: right;
        }
        
        .usage-steps {
            background-color: var(--light-bg);
            padding: 25px;
            border-radius: 10px;
            margin: 30px 0;
        }
        
        .usage-step {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            align-items: center;
        }
        
        .step-number {
            background-color: var(--secondary-color);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .warning-box {
            background-color: #fff3e0;
            border-left: 5px solid #ffa000;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 30px 0;
            font-weight: 500;
        }
        
        .dims-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .dim-card {
            background-color: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        
        .dim-value {
            font-size: 1.3em;
            font-weight: bold;
            color: var(--primary-color);
            margin: 10px 0;
        }
        
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        
        .gallery-item {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
            height: 200px;
            background-color: #f5f5f5;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        
        .gallery-item:hover img {
            transform: scale(1.05);
        }
        
        footer {
            margin-top: 60px;
            padding-top: 30px;
            border-top: 1px solid var(--accent-color);
            color: var(--muted-text);
            font-size: 0.95em;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .feature-grid, .advantages-list, .specs-grid, 
            .dims-grid, .gallery {
                grid-template-columns: 1fr;
            }
            
            body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
        <?php
    }
    
    private function renderProductHeader() {
        ?>
        <h1><?= htmlspecialchars($this->productData['title']) ?></h1>
        <p style="font-size: 1.1em;"><?= htmlspecialchars($this->productData['description']) ?></p>
        <?php
    }
    
    private function renderFeaturesSection() {
        ?>
        <h2><i class="fas fa-info-circle"></i> Основные характеристики</h2>
        <div class="feature-card">
            <div class="feature-grid">
                <?php foreach ($this->productData['features'] as $feature): ?>
                <div class="feature-item">
                    <span class="feature-icon"><?= $feature['icon'] ?></span>
                    <div>
                        <strong><?= htmlspecialchars($feature['label']) ?>:</strong><br>
                        <?= htmlspecialchars($feature['value']) ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <h3 style="margin-top: 30px;"><i class="fas fa-ruler"></i> Размеры</h3>
            <div class="dims-grid">
                <div class="dim-card">
                    <div>Диаметр</div>
                    <div class="dim-value"><?= htmlspecialchars($this->productData['dimensions']['diameter']) ?></div>
                </div>
                <div class="dim-card">
                    <div>Длина</div>
                    <div class="dim-value"><?= htmlspecialchars($this->productData['dimensions']['length']) ?></div>
                </div>
                <div class="dim-card">
                    <div>Головка</div>
                    <div class="dim-value"><?= htmlspecialchars($this->productData['dimensions']['head_diameter']) ?></div>
                </div>
            </div>
        </div>
        <?php
    }
    
    private function renderAdvantages() {
        ?>
        <h2><i class="fas fa-check-circle"></i> Преимущества</h2>
        <ul class="advantages-list">
            <?php foreach ($this->productData['advantages'] as $advantage): ?>
                <li><?= htmlspecialchars($advantage) ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
    
    private function renderTechnicalSpecs() {
        ?>
        <h2><i class="fas fa-clipboard-list"></i> Технические характеристики</h2>
        <div class="specs-grid">
            <div class="specs-card">
                <h3><i class="fas fa-flask"></i> Материалы</h3>
                <?php foreach ($this->technicalSpecs['materials'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-check-double"></i> Совместимость</h3>
                <?php foreach ($this->technicalSpecs['compatibility'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-tachometer-alt"></i> Параметры</h3>
                <?php foreach ($this->technicalSpecs['characteristics'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderUsageInstructions() {
        ?>
        <h2><i class="fas fa-tools"></i> Инструкция по применению</h2>
        <div class="usage-steps">
            <?php foreach ($this->usageInfo as $key => $step): ?>
                <?php if(strpos($key, 'step') === 0): ?>
                <div class="usage-step">
                    <div class="step-number"><?= substr($key, 4) ?></div>
                    <div><?= htmlspecialchars($step) ?></div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
        <div class="warning-box">
            <i class="fas fa-exclamation-triangle"></i> 
            <?= htmlspecialchars($this->usageInfo['warning']) ?>
        </div>
        <?php
    }
    
    private function renderGallerySection() {
        ?>
        <h2><i class="fas fa-images"></i> Галерея</h2>
        <div class="gallery">
            <div class="gallery-item">
                <img src="https://example.com/dowel-package.jpg" alt="Упаковка дюбелей">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/dowel-closeup.jpg" alt="Крупный план дюбеля">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/dowel-installed.jpg" alt="Установленный дюбель">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/dowel-head.jpg" alt="Грибовидная головка">
            </div>
        </div>
        <?php
    }
    
    private function renderFooter() {
        ?>
        <footer>
            <p>© <?= date('Y') ?> Дюбель с грибовидной головкой - надежное крепление для плотных оснований.</p>
        </footer>
</body>
</html>
        <?php
    }
}

// Инициализация и отображение страницы
$dowelsPage = new MushroomDowelsProduct();
$dowelsPage->renderProductPage();
?>
<?php
/**
 * Страница с описанием фосфатированных саморезов по дереву
 * 
 * 
 * 
 */

class PhosphatedScrewsProduct {
    private $productData;
    private $technicalSpecs;
    private $usageInfo;
    
    public function __construct() {
        $this->initializeProductData();
    }
    
    private function initializeProductData() {
        $this->productData = [
            'title' => 'Саморезы по дереву фосфатированные 4.2×75 мм',
            'description' => 'Прочные крепежные изделия с фосфатным покрытием для надежной фиксации деревянных конструкций. Потайная головка и острый наконечник для легкого монтажа.',
            'features' => [
                'type' => ['label' => 'Тип', 'value' => 'Саморез по дереву', 'icon' => '🔩'],
                'coating' => ['label' => 'Покрытие', 'value' => 'Фосфатированное', 'icon' => '🛡️'],
                'size' => ['label' => 'Размер', 'value' => '4.2×75 мм', 'icon' => '📏'],
                'head' => ['label' => 'Головка', 'value' => 'Потайная', 'icon' => '⬇️'],
                'tip' => ['label' => 'Наконечник', 'value' => 'Острый', 'icon' => '⚡'],
                'material' => ['label' => 'Материал', 'value' => 'Сталь', 'icon' => '🛠️'],
                'weight' => ['label' => 'Вес упаковки', 'value' => '1 кг', 'icon' => '🏋️'],
                'mounting' => ['label' => 'Монтаж', 'value' => 'Без предварительного сверления', 'icon' => '🚀']
            ],
            'advantages' => [
                'Широкая сфера применения',
                'Быстрый и простой монтаж',
                'Надежная фиксация элементов',
                'Устойчивость к деформации',
                'Защита от коррозии',
                'Прочность и долговечность',
                'Оптимальное вхождение в материал',
                'Универсальность использования'
            ],
            'dimensions' => [
                'diameter' => '4.2 мм',
                'length' => '75 мм',
                'thread_pitch' => 'Крупная резьба'
            ]
        ];
        
        $this->technicalSpecs = [
            'materials' => [
                'Основной материал' => 'Углеродистая сталь',
                'Покрытие' => 'Фосфатное',
                'Твердость' => 'HRC 45-50'
            ],
            'performance' => [
                'Макс. толщина соединения' => 'До 50 мм',
                'Рекомендуемые материалы' => 'Дерево, ДСП, фанера',
                'Температурный диапазон' => 'От -50°C до +120°C'
            ],
            'packaging' => [
                'Количество в упаковке' => '~200 шт (при весе 1 кг)',
                'Вид упаковки' => 'Пластиковая коробка',
                'Хранение' => 'В сухом помещении'
            ]
        ];
        
        $this->usageInfo = [
            'step1' => 'Выровнять соединяемые поверхности',
            'step2' => 'При необходимости сделать направляющее отверстие (для твердых пород)',
            'step3' => 'Установить саморез под прямым углом',
            'step4' => 'Завернуть шуруповертом или отверткой до утопления головки',
            'tip' => 'Для лучшего вхождения можно использовать воск или мыло',
            'warning' => 'Не применять для ответственных несущих конструкций'
        ];
    }
    
    public function renderProductPage() {
        $this->renderHTMLHeader();
        $this->renderProductHeader();
        $this->renderFeaturesSection();
        $this->renderAdvantages();
        $this->renderTechnicalSpecs();
        $this->renderUsageInstructions();
        $this->renderGallerySection();
        $this->renderFooter();
    }
    
    private function renderHTMLHeader() {
        ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($this->productData['description']) ?>">
    <title><?= htmlspecialchars($this->productData['title']) ?> | Технические характеристики</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #37474f;
            --secondary-color: #546e7a;
            --accent-color: #b0bec5;
            --light-bg: #eceff1;
            --text-color: #263238;
            --muted-text: #546e7a;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
        }
        
        h1, h2, h3 {
            color: var(--primary-color);
            margin-top: 1.8em;
        }
        
        h1 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        
        h2 {
            border-left: 5px solid var(--secondary-color);
            padding-left: 15px;
            margin: 35px 0 20px;
        }
        
        .feature-card {
            background-color: var(--light-bg);
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 15px;
            background-color: rgba(255,255,255,0.8);
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .feature-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            font-size: 1.8em;
            color: var(--secondary-color);
            min-width: 40px;
            text-align: center;
        }
        
        .advantages-list {
            margin: 30px 0;
            padding-left: 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }
        
        .advantages-list li {
            margin-bottom: 15px;
            position: relative;
            padding-left: 40px;
            list-style: none;
            font-size: 1.05em;
        }
        
        .advantages-list li:before {
            content: "•";
            color: var(--secondary-color);
            position: absolute;
            left: 0;
            font-weight: bold;
            font-size: 1.8em;
            line-height: 0.9;
        }
        
        .specs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        
        .specs-card {
            background-color: var(--light-bg);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.05);
        }
        
        .specs-card h3 {
            margin-top: 0;
            color: var(--secondary-color);
            border-bottom: 1px dashed var(--secondary-color);
            padding-bottom: 10px;
        }
        
        .specs-item {
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dotted var(--accent-color);
        }
        
        .specs-value {
            font-weight: bold;
            color: var(--primary-color);
            text-align: right;
        }
        
        .usage-steps {
            background-color: var(--light-bg);
            padding: 25px;
            border-radius: 10px;
            margin: 30px 0;
        }
        
        .usage-step {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            align-items: center;
        }
        
        .step-number {
            background-color: var(--secondary-color);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .tip-box {
            background-color: #e8f5e9;
            border-left: 5px solid #43a047;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
        }
        
        .warning-box {
            background-color: #fff3e0;
            border-left: 5px solid #ffa000;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin: 20px 0;
            font-weight: 500;
        }
        
        .dims-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .dim-card {
            background-color: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        
        .dim-value {
            font-size: 1.3em;
            font-weight: bold;
            color: var(--primary-color);
            margin: 10px 0;
        }
        
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        
        .gallery-item {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
            height: 200px;
            background-color: #f5f5f5;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        
        .gallery-item:hover img {
            transform: scale(1.05);
        }
        
        footer {
            margin-top: 60px;
            padding-top: 30px;
            border-top: 1px solid var(--accent-color);
            color: var(--muted-text);
            font-size: 0.95em;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .feature-grid, .advantages-list, .specs-grid, 
            .dims-grid, .gallery {
                grid-template-columns: 1fr;
            }
            
            body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
        <?php
    }
    
    private function renderProductHeader() {
        ?>
        <h1><?= htmlspecialchars($this->productData['title']) ?></h1>
        <p style="font-size: 1.1em;"><?= htmlspecialchars($this->productData['description']) ?></p>
        <?php
    }
    
    private function renderFeaturesSection() {
        ?>
        <h2><i class="fas fa-info-circle"></i> Основные характеристики</h2>
        <div class="feature-card">
            <div class="feature-grid">
                <?php foreach ($this->productData['features'] as $feature): ?>
                <div class="feature-item">
                    <span class="feature-icon"><?= $feature['icon'] ?></span>
                    <div>
                        <strong><?= htmlspecialchars($feature['label']) ?>:</strong><br>
                        <?= htmlspecialchars($feature['value']) ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <h3 style="margin-top: 30px;"><i class="fas fa-ruler"></i> Параметры</h3>
            <div class="dims-grid">
                <div class="dim-card">
                    <div>Диаметр</div>
                    <div class="dim-value"><?= htmlspecialchars($this->productData['dimensions']['diameter']) ?></div>
                </div>
                <div class="dim-card">
                    <div>Длина</div>
                    <div class="dim-value"><?= htmlspecialchars($this->productData['dimensions']['length']) ?></div>
                </div>
                <div class="dim-card">
                    <div>Резьба</div>
                    <div class="dim-value"><?= htmlspecialchars($this->productData['dimensions']['thread_pitch']) ?></div>
                </div>
            </div>
        </div>
        <?php
    }
    
    private function renderAdvantages() {
        ?>
        <h2><i class="fas fa-check-circle"></i> Преимущества</h2>
        <ul class="advantages-list">
            <?php foreach ($this->productData['advantages'] as $advantage): ?>
                <li><?= htmlspecialchars($advantage) ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
    
    private function renderTechnicalSpecs() {
        ?>
        <h2><i class="fas fa-clipboard-list"></i> Технические характеристики</h2>
        <div class="specs-grid">
            <div class="specs-card">
                <h3><i class="fas fa-flask"></i> Материалы</h3>
                <?php foreach ($this->technicalSpecs['materials'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-tachometer-alt"></i> Эксплуатация</h3>
                <?php foreach ($this->technicalSpecs['performance'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-box-open"></i> Упаковка</h3>
                <?php foreach ($this->technicalSpecs['packaging'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderUsageInstructions() {
        ?>
        <h2><i class="fas fa-tools"></i> Инструкция по применению</h2>
        <div class="usage-steps">
            <?php foreach ($this->usageInfo as $key => $step): ?>
                <?php if(strpos($key, 'step') === 0): ?>
                <div class="usage-step">
                    <div class="step-number"><?= substr($key, 4) ?></div>
                    <div><?= htmlspecialchars($step) ?></div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
        <div class="tip-box">
            <i class="fas fa-lightbulb"></i> 
            <?= htmlspecialchars($this->usageInfo['tip']) ?>
        </div>
        
        <div class="warning-box">
            <i class="fas fa-exclamation-triangle"></i> 
            <?= htmlspecialchars($this->usageInfo['warning']) ?>
        </div>
        <?php
    }
    
    private function renderGallerySection() {
        ?>
        <h2><i class="fas fa-images"></i> Галерея</h2>
        <div class="gallery">
            <div class="gallery-item">
                <img src="https://example.com/screws-package.jpg" alt="Упаковка саморезов">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/screw-closeup.jpg" alt="Крупный план самореза">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/screw-installed.jpg" alt="Установленный саморез">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/screw-head.jpg" alt="Потайная головка">
            </div>
        </div>
        <?php
    }
    
    private function renderFooter() {
        ?>
        <footer>
            <p>© <?= date('Y') ?> Фосфатированные саморезы по дереву - надежное крепление для деревянных конструкций.</p>
        </footer>
</body>
</html>
        <?php
    }
}

// Инициализация и отображение страницы
$screwsPage = new PhosphatedScrewsProduct();
$screwsPage->renderProductPage();
?>
<?php
/**
 * Страница с описанием суперклея Akfix 705
 * 
 * 
 * 
 */

class SuperGlueProduct {
    private $productData;
    private $technicalSpecs;
    private $safetyInfo;
    
    public function __construct() {
        $this->initializeProductData();
    }
    
    private function initializeProductData() {
        $this->productData = [
            'title' => 'Суперклей Akfix 705 (Турция)',
            'description' => 'Двухкомпонентный цианоакрилатный клей-гель высокой вязкости для прочного склеивания различных материалов.',
            'features' => [
                'type' => ['label' => 'Тип', 'value' => 'Двухкомпонентный цианоакрилатный', 'icon' => '🧪'],
                'viscosity' => ['label' => 'Консистенция', 'value' => 'Вязкий гель', 'icon' => '🌀'],
                'color' => ['label' => 'Цвет', 'value' => 'Прозрачный', 'icon' => '🔍'],
                'components' => ['label' => 'Компоненты', 'value' => 'Клей + активатор', 'icon' => '⚗️'],
                'package' => ['label' => 'Упаковка', 'value' => 'Клей (65 г) + аэрозоль (200 мл)', 'icon' => '📦'],
                'drying' => ['label' => 'Схватывание', 'value' => 'Быстрое', 'icon' => '⏱️'],
                'materials' => ['label' => 'Материалы', 'value' => 'Дерево, пластик, кожа, бумага', 'icon' => '🛠️']
            ],
            'advantages' => [
                'Высокая прочность соединения',
                'Быстрое схватывание',
                'Вязкая консистенция не стекает',
                'Влаго- и морозостойкость',
                'Универсальное применение',
                'Эффективен для пористых поверхностей',
                'Комплект из двух компонентов',
                'Удобная упаковка'
            ],
            'properties' => [
                'Прочность склеивания' => 'Очень высокая',
                'Время схватывания' => 'От 30 секунд',
                'Полное отверждение' => '24 часа',
                'Температурный режим' => 'От -30°C до +80°C'
            ]
        ];
        
        $this->technicalSpecs = [
            'composition' => [
                'Основной компонент' => 'Цианоакрилатный гель',
                'Активатор' => 'Аэрозольный состав',
                'Добавки' => 'Стабилизаторы, загустители'
            ],
            'application' => [
                'Толщина слоя' => '0,1-0,3 мм',
                'Рекомендуемая температура' => '+15°C до +25°C',
                'Срок хранения' => '12 месяцев',
                'Расход' => '~10 м/п на 50 г'
            ],
            'compatibility' => [
                'Дерево' => 'Отлично',
                'Пластики' => 'Хорошо (кроме PE, PP)',
                'Кожа' => 'Очень хорошо',
                'Металлы' => 'Требуется праймер'
            ]
        ];
        
        $this->safetyInfo = [
            'warning' => 'Состав горючий, обладает сильным запахом',
            'precautions' => [
                'Обеспечьте хорошую вентиляцию',
                'Избегайте контакта с кожей и глазами',
                'Используйте перчатки и очки',
                'Храните в недоступном для детей месте'
            ],
            'first_aid' => [
                'При попадании в глаза' => 'Промыть водой 15 мин, обратиться к врачу',
                'На коже' => 'Промыть с мылом, не использовать растворители',
                'Проглатывание' => 'Немедленно к врачу'
            ]
        ];
    }
    
    public function renderProductPage() {
        $this->renderHTMLHeader();
        $this->renderProductHeader();
        $this->renderFeaturesSection();
        $this->renderProperties();
        $this->renderAdvantages();
        $this->renderTechnicalSpecs();
        $this->renderSafetyInfo();
        $this->renderGallerySection();
        $this->renderFooter();
    }
    
    private function renderHTMLHeader() {
        ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($this->productData['description']) ?>">
    <title><?= htmlspecialchars($this->productData['title']) ?> | Технические характеристики</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #006064;
            --secondary-color: #00838f;
            --accent-color: #b2ebf2;
            --light-bg: #e0f7fa;
            --text-color: #004d40;
            --muted-text: #00796b;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
        }
        
        h1, h2, h3 {
            color: var(--primary-color);
            margin-top: 1.8em;
        }
        
        h1 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        
        h2 {
            border-left: 5px solid var(--secondary-color);
            padding-left: 15px;
            margin: 35px 0 20px;
        }
        
        .feature-card {
            background-color: var(--light-bg);
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 15px;
            background-color: rgba(255,255,255,0.8);
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .feature-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            font-size: 1.8em;
            color: var(--secondary-color);
            min-width: 40px;
            text-align: center;
        }
        
        .props-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .prop-card {
            background-color: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        
        .prop-value {
            font-size: 1.3em;
            font-weight: bold;
            color: var(--primary-color);
            margin: 10px 0;
        }
        
        .advantages-list {
            margin: 30px 0;
            padding-left: 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }
        
        .advantages-list li {
            margin-bottom: 15px;
            position: relative;
            padding-left: 40px;
            list-style: none;
            font-size: 1.05em;
        }
        
        .advantages-list li:before {
            content: "✓";
            color: var(--secondary-color);
            position: absolute;
            left: 0;
            font-weight: bold;
            font-size: 1.5em;
        }
        
        .specs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        
        .specs-card {
            background-color: var(--light-bg);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.05);
        }
        
        .specs-card h3 {
            margin-top: 0;
            color: var(--secondary-color);
            border-bottom: 1px dashed var(--secondary-color);
            padding-bottom: 10px;
        }

        .specs-item {
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dotted var(--accent-color);
        }
        
        .specs-value {
            font-weight: bold;
            color: var(--primary-color);
            text-align: right;
        }
        
        .safety-card {
            background-color: #ffebee;
            padding: 25px;
            border-radius: 10px;
            margin: 30px 0;
            border-left: 5px solid #c62828;
        }
        
        .precaution-item {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            align-items: flex-start;
        }
        
        .precaution-icon {
            color: #c62828;
            font-size: 1.2em;
            margin-top: 3px;
        }
        
        .first-aid-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .aid-card {
            background-color: #fff3e0;
            padding: 20px;
            border-radius: 8px;
            border-left: 5px solid #ff8f00;
        }
        
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        
        .gallery-item {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
            height: 200px;
            background-color: #f5f5f5;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }
        
        .gallery-item:hover img {
            transform: scale(1.05);
        }
        
        footer {
            margin-top: 60px;
            padding-top: 30px;
            border-top: 1px solid var(--accent-color);
            color: var(--muted-text);
            font-size: 0.95em;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .feature-grid, .props-grid, .advantages-list, 
            .specs-grid, .first-aid-grid, .gallery {
                grid-template-columns: 1fr;
            }
            
            body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
        <?php
    }
    
    private function renderProductHeader() {
        ?>
        <h1><?= htmlspecialchars($this->productData['title']) ?></h1>
        <p style="font-size: 1.1em;"><?= htmlspecialchars($this->productData['description']) ?></p>
        <?php
    }
    
    private function renderFeaturesSection() {
        ?>
        <h2><i class="fas fa-info-circle"></i> Основные характеристики</h2>
        <div class="feature-card">
            <div class="feature-grid">
                <?php foreach ($this->productData['features'] as $feature): ?>
                <div class="feature-item">
                    <span class="feature-icon"><?= $feature['icon'] ?></span>
                    <div>
                        <strong><?= htmlspecialchars($feature['label']) ?>:</strong><br>
                        <?= htmlspecialchars($feature['value']) ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderProperties() {
        ?>
        <h2><i class="fas fa-flask"></i> Свойства клея</h2>
        <div class="props-grid">
            <?php foreach ($this->productData['properties'] as $prop => $value): ?>
            <div class="prop-card">
                <div><?= htmlspecialchars($prop) ?></div>
                <div class="prop-value"><?= htmlspecialchars($value) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
    
    private function renderAdvantages() {
        ?>
        <h2><i class="fas fa-check-double"></i> Преимущества</h2>
        <ul class="advantages-list">
            <?php foreach ($this->productData['advantages'] as $advantage): ?>
                <li><?= htmlspecialchars($advantage) ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
    
    private function renderTechnicalSpecs() {
        ?>
        <h2><i class="fas fa-clipboard-list"></i> Технические характеристики</h2>
        <div class="specs-grid">
            <div class="specs-card">
                <h3><i class="fas fa-atom"></i> Состав</h3>
                <?php foreach ($this->technicalSpecs['composition'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-tools"></i> Применение</h3>
                <?php foreach ($this->technicalSpecs['application'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="specs-card">
                <h3><i class="fas fa-thumbs-up"></i> Совместимость</h3>
                <?php foreach ($this->technicalSpecs['compatibility'] as $param => $value): ?>
                    <div class="specs-item">
                        <span><?= htmlspecialchars($param) ?>:</span>
                        <span class="specs-value"><?= htmlspecialchars($value) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderSafetyInfo() {
        ?>
        <h2><i class="fas fa-exclamation-triangle"></i> Меры предосторожности</h2>
        <div class="safety-card">
            <h3 style="color: #c62828; margin-top: 0;"><?= htmlspecialchars($this->safetyInfo['warning']) ?></h3>
            
            <h4>Рекомендации по безопасности:</h4>
            <?php foreach ($this->safetyInfo['precautions'] as $precaution): ?>
            <div class="precaution-item">
                <div class="precaution-icon"><i class="fas fa-shield-alt"></i></div>
                <div><?= htmlspecialchars($precaution) ?></div>
            </div>
            <?php endforeach; ?>
            
            <h4 style="margin-top: 20px;">Первая помощь:</h4>
            <div class="first-aid-grid">
                <?php foreach ($this->safetyInfo['first_aid'] as $case => $action): ?>
                <div class="aid-card">
                    <strong><?= htmlspecialchars($case) ?>:</strong>
                    <p><?= htmlspecialchars($action) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
    
    private function renderGallerySection() {
        ?>
        <h2><i class="fas fa-images"></i> Галерея</h2>
        <div class="gallery">
            <div class="gallery-item">
                <img src="https://example.com/akfix-package.jpg" alt="Упаковка клея Akfix 705">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/akfix-components.jpg" alt="Компоненты клея">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/akfix-application.jpg" alt="Процесс нанесения">
            </div>
            <div class="gallery-item">
                <img src="https://example.com/akfix-result.jpg" alt="Результат склеивания">
            </div>
        </div>
        <?php
    }
    
    private function renderFooter() {
        ?>
        <footer>
            <p>© <?= date('Y') ?> Суперклей Akfix 705 - профессиональное решение для прочного склеивания.</p>
        </footer>
</body>
</html>
        <?php
    }
}

// Инициализация и отображение страницы
$gluePage = new SuperGlueProduct();
$gluePage->renderProductPage();
?>
<?php
/**
 * Страница с описанием быстротвердеющего наливного пола с калькулятором
 * 
 * 
 *
 */

class FloorProduct {
    private $productData;
    private $technicalSpecs;
    private $applicationInfo;
    
    public function __construct() {
        $this->initializeProductData();
    }
    
    private function initializeProductData() {
        $this->productData = [
            'title' => 'Быстротвердеющий наливной пол для ручного и машинного выравнивания',
            'description' => 'Высокопрочная смесь для выравнивания бетонных полов и цементных стяжек с армирующими волокнами, подходит для систем "Тёплый пол" и "Плавающий пол".',
            'productCode' => 'NP-2023-F',
            'consumption' => 1.6, // кг/м² на 1 мм толщины
            'bagWeight' => 20, // кг в мешке
            'features' => [
                'application' => ['label' => 'Применение', 'value' => 'Ручное и машинное выравнивание', 'icon' => '🛠️'],
                'layer' => ['label' => 'Слой нанесения', 'value' => '3-100 мм', 'icon' => '📏'],
                'drying' => ['label' => 'Хождение по полу', 'value' => 'Через 3 часа', 'icon' => '⏱️'],
                'strength' => ['label' => 'Прочность', 'value' => '200 кг/см²', 'icon' => '💪'],
                'fibers' => ['label' => 'Армирование', 'value' => 'Усилен волокнами', 'icon' => '🔄'],
                'tiles' => ['label' => 'Укладка плитки', 'value' => 'Через 24 часа', 'icon' => '🧱'],
                'base' => ['label' => 'Основание', 'value' => 'Бетон, цементные стяжки', 'icon' => '🏗️'],
                'systems' => ['label' => 'Системы', 'value' => '"Тёплый пол", "Плавающий пол"', 'icon' => '🔥']
            ],
            'advantages' => [
                'Быстрое высыхание - хождение через 2 часа',
                'Высокая прочность до 200 кг/см²',
                'Армирование волокнами против трещин',
                'Подходит для систем "Тёплый пол"',
                'Можно наносить слоем от 3 до 100 мм',
                'Для всех типов напольных покрытий',
                'Применение в помещениях с повышенной влажностью',
                'Минимальная усадка при высыхании'
            ],
            'compatibility' => [
                'Линолеум', 'Ковролин', 'Керамическая плитка', 
                'Ламинат', 'Паркет', 'Паркетная доска'
            ]
        ];
        
        $this->technicalSpecs = [
            'composition' => [
                'Основа' => 'Цементная',
                'Наполнители' => 'Минеральные',
                'Модификаторы' => 'Полимерные',
                'Армирование' => 'Фибра'
            ],
            'performance' => [
                'Прочность на сжатие' => '200 кг/см²',
                'Адгезия к бетону' => '≥1 МПа',
                'Расход' => '1.6 кг/м² на 1 мм',
                'Жизнеспособность' => '40 минут',
                'Гарантия' => '12 месяцев',
                'Срок хранения' => '12 месяцев'
            ],
            'application' => [
                'Температура основания' => '+5°C до +30°C',
                'Температура воздуха' => '+10°C до +25°C',
                'Влажность основания' => 'Не более 4%',
                'Возраст основания' => 'Не менее 28 суток'
            ]
        ];
        
        $this->applicationInfo = [
            'step1' => 'Подготовить основание: очистить, обеспылить, загрунтовать',
            'step2' => 'Приготовить раствор согласно инструкции',
            'step3' => 'Нанести смесь, начиная с дальнего угла помещения',
            'step4' => 'Разровнять смесь зубчатым шпателем или раклей',
            'step5' => 'Прокатать игольчатым валиком для удаления пузырьков воздуха',
            'step6' => 'Выдержать необходимое время до полного высыхания',
            'tip' => 'Для лучшего результата используйте грунтовку глубокого проникновения',
            'warning' => 'Не допускайте сквозняков и прямого солнечного света в первые 24 часа'
        ];
    }
    
    public function renderProductPage() {
        $this->renderHTMLHeader();
        $this->renderProductHeader();
        $this->renderCalculatorSection(); // Добавляем калькулятор
        $this->renderFeaturesSection();
        $this->renderAdvantages();
        $this->renderTechnicalSpecs();
        $this->renderApplication();
        $this->renderCompatibility();
        $this->renderGallerySection();
        $this->renderFooter();
    }

    private function renderCalculatorSection() {
        // Обработка данных формы
        $length = isset($_POST['length']) ? (float)$_POST['length'] : 0;
        $width = isset($_POST['width']) ? (float)$_POST['width'] : 0;
        $thickness = isset($_POST['thickness']) ? (float)$_POST['thickness'] : 10;
        
        // Проверка минимальных значений
        if ($length < 0.1) $length = 0;
        if ($width < 0.1) $width = 0;
        if ($thickness < 3) $thickness = 3;
        if ($thickness > 100) $thickness = 100;
        
        $showResults = false;
        $area = 0;
        $totalConsumption = 0;
        $bagsNeeded = 0;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $length > 0 && $width > 0) {
            $showResults = true;
            $area = $length * $width;
            $totalConsumption = $area * $thickness * $this->productData['consumption'];
            $bagsNeeded = ceil($totalConsumption / $this->productData['bagWeight']);
        }
        ?>
        <h2><i class="fas fa-calculator"></i> Калькулятор расхода</h2>
        <div class="calculator-card">
            <form method="post" class="calculator-form">
                <div class="calculator-grid">
                    <div class="calculator-input">
                        <label for="length">Длина помещения (м):</label>
                        <input type="number" step="0.1" min="0.1" id="length" name="length" 
                               value="<?= htmlspecialchars($length > 0 ? $length : '') ?>" required>
                    </div>
                    
                    <div class="calculator-input">
                        <label for="width">Ширина помещения (м):</label>
                        <input type="number" step="0.1" min="0.1" id="width" name="width" 
                               value="<?= htmlspecialchars($width > 0 ? $width : '') ?>" required>
                    </div>
                    
                    <div class="calculator-input">
                        <label for="thickness">Толщина слоя (мм):</label>
                        <input type="number" step="1" min="3" max="100" id="thickness" name="thickness" 
                               value="<?= htmlspecialchars($thickness) ?>" required>
                    </div>
                    
                    <div class="calculator-submit">
                        <button type="submit">Рассчитать</button>
                    </div>
                </div>
            </form>
            
            <?php if ($showResults): ?>
            <div class="calculator-results">
                <h3>Результаты расчета:</h3>
                <div class="result-item">
                    <span>Площадь помещения:</span>
                    <strong><?= round($area, 2) ?> м²</strong>
                </div>
                <div class="result-item">
                    <span>Необходимое количество смеси:</span>
                    <strong><?= round($totalConsumption, 1) ?> кг</strong>
                </div>
                <div class="result-item">
                    <span>Количество мешков по <?= $this->productData['bagWeight'] ?> кг:</span>
                    <strong><?= $bagsNeeded ?> шт.</strong>
                </div>
                <div class="result-note">
                    <i class="fas fa-info-circle"></i> Расход указан из расчета <?= $this->productData['consumption'] ?> кг/м² на 1 мм толщины
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php
    }

    private function renderHTMLHeader() {
        ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($this->productData['description']) ?>">
    <title><?= htmlspecialchars($this->productData['title']) ?> | Описание</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #5d4037;
            --secondary-color: #8d6e63;
            --accent-color: #d7ccc8;
            --light-bg: #efebe9;
            --text-color: #3e2723;
            --muted-text: #6d4c41;
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
        }
        
        h1, h2, h3 {
            color: var(--primary-color);
            margin-top: 1.8em;
        }
        
        h1 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        
        h2 {
            border-left: 5px solid var(--secondary-color);
            padding-left: 15px;
            margin: 35px 0 20px;
        }
        
        .product-code {
            background-color: var(--light-bg);
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.9em;
            color: var(--muted-text);
        }
        
        /* Стили для калькулятора */
        .calculator-card {
            background-color: var(--light-bg);
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .calculator-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 22px;
        }
        
        .calculator-input {
            display: flex;
            flex-direction: column;
        }
        
        .calculator-input label {
            margin-bottom: 8px;
            font-weight: 501;
        }
        
        .calculator-input input {
            padding: 12px;
            border: 1px solid var(--accent-color);
            border-radius: 6px;
            font-size: 1em;
        }
        
        .calculator-submit button {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
            align-self: flex-end;
        }
        
        .calculator-submit button:hover {
            background-color: var(--primary-color);
        }
        
        .calculator-results {
            background-color: white;
            padding: 21px;
            border-radius: 8px;
            margin-top: 19px;
        }
        
        .result-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid var(--accent-color);
        }
        
        .result-item strong {
            color: var(--primary-color);
        }
        
        .result-note {
            margin-top: 15px;
            font-size: 0.9em;
            color: var(--muted-text);
        }
        
        /* Остальные стили без изменений */
        .feature-card {
            background-color: var(--light-bg);
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 15px;
            background-color: rgba(255,255,255,0.9);
            border-radius: 7px;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            font-size: 1.8em;
            color: var(--secondary-color);
            min-width: 40px;
            text-align: center;
        }
        
        .advantages-list {
            margin: 30px 0;
            padding-left: 0;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }
        
        .advantages-list li {
            margin-bottom: 15px;
            position: relative;
            padding-left: 40px;
            list-style: none;
            font-size: 1.05em;
        }
        
        .advantages-list li:before {
            content: "•";
            color: var(--secondary-color);
            position: absolute;
            left: 0;
            font-weight: bold;
            font-size: 1.8em;
            line-height: 0.9;
        }
        
        .specs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }
