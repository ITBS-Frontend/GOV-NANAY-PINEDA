<?php
// Default values if not set
$pageTitle = isset($pageTitle) ? $pageTitle : 'Gov. Lilia "Nanay" Pineda - Official Portfolio';
$pageDescription = isset($pageDescription) ? $pageDescription : 'Official portfolio of Governor Lilia "Nanay" Pineda showcasing transformative governance and development initiatives in Pampanga.';
$additionalCSS = isset($additionalCSS) ? $additionalCSS : [];
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $pageDescription; ?>">
<meta name="keywords" content="Lilia Pineda, Nanay Pineda, Pampanga Governor, Philippine Politics, Public Service">
<meta name="author" content="Office of Gov. Lilia Pineda">
<title><?php echo $pageTitle; ?></title>

<!-- Favicon -->
<link rel="icon" type="image/png" href="assets/Ph_seal_pampanga.png">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Main CSS -->
<link rel="stylesheet" href="css/style.css">

<!-- Additional CSS files -->
<?php foreach ($additionalCSS as $css): ?>
<link rel="stylesheet" href="<?php echo $css; ?>">
<?php endforeach; ?>