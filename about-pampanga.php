<?php
$pageTitle = "About Pampanga - Province Information";
$pageDescription = "Learn about the history, demographics, and geography of Pampanga province.";
$additionalCSS = ['css/about-pampanga.css'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/head.php'; ?>
     <?php include 'components/scripts.php'; ?>
</head>
<body>
    <?php include 'components/header.php'; ?>

    <main class="about-pampanga-page">
        <!-- Page Header -->
        <section class="page-header">
            <div class="header-content">
                <h1 class="page-title">About Pampanga</h1>
                <p class="page-subtitle">Discover the rich history, vibrant culture, and dynamic growth of Pampanga province</p>
            </div>
        </section>

        <!-- Quick Stats Banner -->
        <section class="stats-banner" id="statsBanner">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-card">
                        <i class="fas fa-users stat-icon"></i>
                        <div class="stat-content">
                            <span class="stat-value" id="populationStat">-</span>
                            <span class="stat-label">Population</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <i class="fas fa-map stat-icon"></i>
                        <div class="stat-content">
                            <span class="stat-value" id="areaStat">-</span>
                            <span class="stat-label">Land Area</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <i class="fas fa-city stat-icon"></i>
                        <div class="stat-content">
                            <span class="stat-value" id="municipalitiesStat">-</span>
                            <span class="stat-label">Municipalities</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <i class="fas fa-graduation-cap stat-icon"></i>
                        <div class="stat-content">
                            <span class="stat-value" id="literacyStat">-</span>
                            <span class="stat-label">Literacy Rate</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tab Navigation -->
        <section class="content-tabs-section">
            <div class="container">
                <div class="content-tabs">
                    <button class="tab-btn active" data-tab="history">
                        <i class="fas fa-book"></i>
                        <span>History</span>
                    </button>
                    <button class="tab-btn" data-tab="demographics">
                        <i class="fas fa-chart-pie"></i>
                        <span>Demographics</span>
                    </button>
                    <button class="tab-btn" data-tab="geography">
                        <i class="fas fa-globe"></i>
                        <span>Geography</span>
                    </button>
                    <button class="tab-btn" data-tab="municipalities">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Municipalities</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Content Sections -->
        <div class="container">
            <!-- History Tab Content -->
            <section class="tab-content active" id="history-content">
                <div class="section-header">
                    <h2 class="section-title">Historical Journey</h2>
                    <p class="section-subtitle">From Spanish colonization to modern progress</p>
                </div>
                
                <div class="timeline" id="historyTimeline">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
            </section>

            <!-- Demographics Tab Content -->
            <section class="tab-content" id="demographics-content">
                <div class="section-header">
                    <h2 class="section-title">Demographics & Statistics</h2>
                    <p class="section-subtitle">Population and socio-economic data</p>
                </div>

                <div class="demographics-grid" id="demographicsGrid">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
            </section>

            <!-- Geography Tab Content -->
            <section class="tab-content" id="geography-content">
                <div class="section-header">
                    <h2 class="section-title">Geographic Information</h2>
                    <p class="section-subtitle">Landmarks, boundaries, and natural features</p>
                </div>

                <div class="geography-sections" id="geographySections">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
            </section>

            <!-- Municipalities Tab Content -->
            <section class="tab-content" id="municipalities-content">
                <div class="section-header">
                    <h2 class="section-title">Municipalities</h2>
                    <p class="section-subtitle">Cities and municipalities of Pampanga</p>
                </div>

                <div class="municipalities-grid" id="municipalitiesGrid">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <?php include 'components/footer.php'; ?>
    
    <button class="scroll-top" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <?php include 'components/scripts.php'; ?>
    
    <script>
        $(document).ready(function() {
            const API_BASE = window.location.origin;
            
            // Load all data
            loadDemographicsStats();
            loadHistory();
            loadDemographics();
            loadGeography();
            loadMunicipalities();
            
            // Tab switching
            $('.tab-btn').click(function() {
                const tab = $(this).data('tab');
                
                $('.tab-btn').removeClass('active');
                $(this).addClass('active');
                
                $('.tab-content').removeClass('active');
                $(`#${tab}-content`).addClass('active');
            });
            
            // Load stats for banner
            function loadDemographicsStats() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/province/demographics`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            const data = response.data;
                            
                            // Find specific stats
                            const population = data.find(d => d.data_type === 'population' && d.label === 'Total Population');
                            const literacy = data.find(d => d.data_type === 'literacy_rate');
                            
                            if (population) $('#populationStat').text(population.value);
                            if (literacy) $('#literacyStat').text(literacy.value);
                        }
                    }
                });
                
                $.ajax({
                    url: `${API_BASE}/Admin/api/province/geography`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            const area = response.data.find(d => d.info_type === 'municipality' && d.name === 'Total Land Area');
                            if (area && area.area_sqkm) {
                                $('#areaStat').text(area.area_sqkm.toFixed(2) + ' km²');
                            }
                        }
                    }
                });
                
                $.ajax({
                    url: `${API_BASE}/Admin/api/province/municipalities`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            $('#municipalitiesStat').text(response.data.length);
                        }
                    }
                });
            }
            
            // Load history timeline
            function loadHistory() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/province/history`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderHistory(response.data);
                        }
                    },
                    error: function() {
                        $('#historyTimeline').html('<p class="no-data">Failed to load history data</p>');
                    }
                });
            }
            
            function renderHistory(history) {
                if (history.length === 0) {
                    $('#historyTimeline').html('<p class="no-data">No history data available</p>');
                    return;
                }
                
                let html = '';
                history.forEach((item, index) => {
                    const isLeft = index % 2 === 0;
                    html += `
                        <div class="timeline-item ${isLeft ? 'left' : 'right'}">
                            <div class="timeline-marker"></div>
                            <div class="timeline-card">
                                ${item.image_url ? `<img src="${item.image_url}" alt="${item.title}" class="timeline-image">` : ''}
                                <div class="timeline-content">
                                    <span class="timeline-year">${item.timeline_year || ''}</span>
                                    <h3 class="timeline-title">${item.title}</h3>
                                    <p class="timeline-period">${item.period || ''}</p>
                                    <p class="timeline-text">${item.content}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });
                
                $('#historyTimeline').html(html);
            }
            
            // Load demographics
            function loadDemographics() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/province/demographics`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.grouped) {
                            renderDemographics(response.grouped);
                        }
                    },
                    error: function() {
                        $('#demographicsGrid').html('<p class="no-data">Failed to load demographics data</p>');
                    }
                });
            }
            
            function renderDemographics(grouped) {
                let html = '';
                
                Object.keys(grouped).forEach(type => {
                    const items = grouped[type];
                    const typeTitle = type.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                    
                    html += `
                        <div class="demo-category">
                            <h3 class="demo-category-title">
                                <i class="fas fa-chart-bar"></i>
                                ${typeTitle}
                            </h3>
                            <div class="demo-items">
                    `;
                    
                    items.forEach(item => {
                        html += `
                            <div class="demo-item">
                                <div class="demo-label">${item.label}</div>
                                <div class="demo-value">${item.value}</div>
                                ${item.year ? `<div class="demo-meta">Year: ${item.year}</div>` : ''}
                                ${item.source ? `<div class="demo-source">Source: ${item.source}</div>` : ''}
                            </div>
                        `;
                    });
                    
                    html += `
                            </div>
                        </div>
                    `;
                });
                
                $('#demographicsGrid').html(html);
            }
            
            // Load geography
            function loadGeography() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/province/geography`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.grouped) {
                            renderGeography(response.grouped);
                        }
                    },
                    error: function() {
                        $('#geographySections').html('<p class="no-data">Failed to load geography data</p>');
                    }
                });
            }
            
            function renderGeography(grouped) {
                let html = '';
                
                const typeIcons = {
                    'landmark': 'fas fa-mountain',
                    'boundary': 'fas fa-border-all',
                    'municipality': 'fas fa-city'
                };
                
                Object.keys(grouped).forEach(type => {
                    const items = grouped[type];
                    const typeTitle = type.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                    const icon = typeIcons[type] || 'fas fa-map-pin';
                    
                    html += `
                        <div class="geo-section">
                            <h3 class="geo-section-title">
                                <i class="${icon}"></i>
                                ${typeTitle}
                            </h3>
                            <div class="geo-items">
                    `;
                    
                    items.forEach(item => {
                        html += `
                            <div class="geo-item">
                                <h4 class="geo-item-title">${item.name}</h4>
                                ${item.description ? `<p class="geo-item-desc">${item.description}</p>` : ''}
                                <div class="geo-item-details">
                                    ${item.area_sqkm ? `<span><i class="fas fa-ruler-combined"></i> ${item.area_sqkm} km²</span>` : ''}
                                    ${item.population ? `<span><i class="fas fa-users"></i> ${item.population.toLocaleString()}</span>` : ''}
                                    ${item.coordinates ? `<span><i class="fas fa-map-marker-alt"></i> ${item.coordinates}</span>` : ''}
                                </div>
                            </div>
                        `;
                    });
                    
                    html += `
                            </div>
                        </div>
                    `;
                });
                
                $('#geographySections').html(html);
            }
            
            // Load municipalities
            function loadMunicipalities() {
                $.ajax({
                    url: `${API_BASE}/Admin/api/province/municipalities`,
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.data) {
                            renderMunicipalities(response.data);
                        }
                    },
                    error: function() {
                        $('#municipalitiesGrid').html('<p class="no-data">Failed to load municipalities data</p>');
                    }
                });
            }
            
            function renderMunicipalities(municipalities) {
                if (municipalities.length === 0) {
                    $('#municipalitiesGrid').html('<p class="no-data">No municipalities data available</p>');
                    return;
                }
                
                let html = '';
                municipalities.forEach(muni => {
                    html += `
                        <div class="municipality-card">
                            <div class="muni-header">
                                <h3 class="muni-name">${muni.name}</h3>
                                ${muni.mayor_name ? `<p class="muni-mayor"><i class="fas fa-user-tie"></i> Mayor ${muni.mayor_name}</p>` : ''}
                            </div>
                            <div class="muni-details">
                                ${muni.population ? `
                                    <div class="muni-detail">
                                        <i class="fas fa-users"></i>
                                        <span>${muni.population.toLocaleString()} residents</span>
                                    </div>
                                ` : ''}
                                ${muni.area_sqkm ? `
                                    <div class="muni-detail">
                                        <i class="fas fa-ruler-combined"></i>
                                        <span>${muni.area_sqkm} km²</span>
                                    </div>
                                ` : ''}
                                ${muni.contact_number ? `
                                    <div class="muni-detail">
                                        <i class="fas fa-phone"></i>
                                        <span>${muni.contact_number}</span>
                                    </div>
                                ` : ''}
                                ${muni.email ? `
                                    <div class="muni-detail">
                                        <i class="fas fa-envelope"></i>
                                        <span>${muni.email}</span>
                                    </div>
                                ` : ''}
                            </div>
                        </div>
                    `;
                });
                
                $('#municipalitiesGrid').html(html);
            }
        });
    </script>
</body>
</html>