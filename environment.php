<?php
$pageTitle = 'Environment & Disaster Management - Gov. Lilia "Nanay" Pineda';
$pageDescription = 'Environmental programs and disaster preparedness initiatives in Pampanga';
$additionalCSS = ['css/environment.css'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'components/head.php'; ?>
      <?php include 'components/scripts.php'; ?>
</head>
<body>
    <?php include 'components/header.php'; ?>

    <!-- Hero Section -->
    <section class="page-hero">
        <div class="hero-content">
            <h1 class="hero-title">Environment & Disaster Management</h1>
            <p class="hero-subtitle">Protecting our environment and keeping Pampanga safe and resilient</p>
        </div>
    </section>

    <!-- Environmental Programs Section -->
    <section class="environmental-programs">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Environmental Programs</h2>
                <p class="section-subtitle">Sustainability initiatives for a greener Pampanga</p>
            </div>

            <!-- Program Type Filter -->
            <div class="filter-tabs" id="programTypeTabs">
                <button class="filter-tab active" data-type="">All Programs</button>
                <button class="filter-tab" data-type="conservation">
                    <i class="fas fa-tree"></i> Conservation
                </button>
                <button class="filter-tab" data-type="pollution_control">
                    <i class="fas fa-wind"></i> Pollution Control
                </button>
                <button class="filter-tab" data-type="waste_management">
                    <i class="fas fa-recycle"></i> Waste Management
                </button>
            </div>

            <!-- Programs Grid -->
            <div class="programs-grid" id="programsGrid">
                <div class="loading-state">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Loading programs...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Disaster Preparedness Section -->
    <section class="disaster-preparedness">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Disaster Preparedness</h2>
                <p class="section-subtitle">Emergency preparedness guides and resources</p>
            </div>

            <div class="preparedness-grid" id="preparednessGrid">
                <div class="loading-state">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Loading preparedness guides...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Facilities Section -->
    <section class="emergency-facilities">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Emergency Facilities</h2>
                <p class="section-subtitle">Evacuation centers and emergency resources</p>
            </div>

            <!-- Facility Type Filter -->
            <div class="filter-tabs" id="facilityTypeTabs">
                <button class="filter-tab active" data-type="">All Facilities</button>
            </div>

            <div class="facilities-grid" id="facilitiesGrid">
                <div class="loading-state">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Loading facilities...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Disaster Incidents History Section -->
    <section class="disaster-history">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Disaster Response History</h2>
                <p class="section-subtitle">Past incidents and response actions</p>
            </div>

            <div class="incidents-timeline" id="incidentsTimeline">
                <div class="loading-state">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Loading incident history...</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Detail Modal -->
    <div class="modal" id="programModal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <button class="modal-close">
                <i class="fas fa-times"></i>
            </button>
            <div class="modal-body" id="programModalBody"></div>
        </div>
    </div>

    <!-- Preparedness Detail Modal -->
    <div class="modal" id="preparednessModal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <button class="modal-close">
                <i class="fas fa-times"></i>
            </button>
            <div class="modal-body" id="preparednessModalBody"></div>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>

        <button class="scroll-top" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
 <script>
$(document).ready(function() {
    const API_BASE = window.location.origin;
    let allPrograms = [];
    let allFacilities = [];

    // Load all data
    loadEnvironmentalPrograms();
    loadDisasterPreparedness();
    loadEmergencyFacilities();
    loadDisasterIncidents();

    // Program type filter click
    $(document).on('click', '#programTypeTabs .filter-tab', function() {
        $('#programTypeTabs .filter-tab').removeClass('active');
        $(this).addClass('active');
        const programType = $(this).data('type');
        filterAndRenderPrograms(programType);
    });

    // Facility type filter click
    $(document).on('click', '#facilityTypeTabs .filter-tab', function() {
        $('#facilityTypeTabs .filter-tab').removeClass('active');
        $(this).addClass('active');
        const facilityType = $(this).data('type');
        filterAndRenderFacilities(facilityType);
    });

    // Program card click
    $(document).on('click', '.program-card', function() {
        const programData = $(this).data('program');
        showProgramModal(programData);
    });

    // Preparedness card click
    $(document).on('click', '.preparedness-card', function() {
        const prepData = $(this).data('preparedness');
        showPreparednessModal(prepData);
    });

    // Modal close
    $('.modal-close, .modal-overlay').on('click', function() {
        $('.modal').removeClass('active');
    });

    function loadEnvironmentalPrograms() {
        $.ajax({
            url: `${API_BASE}/Admin/api/environment/programs`,
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    allPrograms = response.data;
                    filterAndRenderPrograms('');
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to load programs:', error);
                $('#programsGrid').html(`
                    <div class="error-state">
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Failed to load environmental programs.</p>
                    </div>
                `);
            }
        });
    }

    function filterAndRenderPrograms(programType) {
        let filteredPrograms = allPrograms;
        
        if (programType) {
            // Convert filter value to uppercase for comparison
            const filterUpper = programType.toUpperCase().replace('_', ' ');
            filteredPrograms = allPrograms.filter(function(p) {
                // Check both lowercase with underscore and uppercase with space
                return p.program_type === programType || 
                       (p.program_type && p.program_type.toUpperCase().replace('_', ' ') === filterUpper);
            });
        }
        
        renderPrograms(filteredPrograms);
    }

    function loadDisasterPreparedness() {
        $.ajax({
            url: `${API_BASE}/Admin/api/environment/disaster-management`,
            method: 'GET',
            success: function(response) {
                if (response.success && response.data.preparedness_guides) {
                    renderPreparedness(response.data.preparedness_guides);
                } else {
                    $('#preparednessGrid').html(`
                        <div class="empty-state">
                            <i class="fas fa-folder-open"></i>
                            <p>No preparedness guides available.</p>
                        </div>
                    `);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to load preparedness:', error);
                $('#preparednessGrid').html(`
                    <div class="error-state">
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Failed to load preparedness guides.</p>
                    </div>
                `);
            }
        });
    }

    function loadEmergencyFacilities() {
        $.ajax({
            url: `${API_BASE}/Admin/api/environment/emergency-facilities`,
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    allFacilities = response.data;
                    extractFacilityTypes(response.data);
                    filterAndRenderFacilities('');
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to load facilities:', error);
                $('#facilitiesGrid').html(`
                    <div class="error-state">
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Failed to load facilities.</p>
                    </div>
                `);
            }
        });
    }

    function filterAndRenderFacilities(facilityType) {
        let filteredFacilities = facilityType 
            ? allFacilities.filter(f => f.facility_type === facilityType)
            : allFacilities;
        
        renderFacilities(filteredFacilities);
    }

    function loadDisasterIncidents() {
        $.ajax({
            url: `${API_BASE}/Admin/api/environment/disaster-incidents`,
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    renderIncidents(response.data);
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to load incidents:', error);
                $('#incidentsTimeline').html(`
                    <div class="error-state">
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Failed to load incident history.</p>
                    </div>
                `);
            }
        });
    }

    function renderPrograms(programs) {
        if (!programs || programs.length === 0) {
            $('#programsGrid').html(`
                <div class="empty-state">
                    <i class="fas fa-folder-open"></i>
                    <p>No programs found.</p>
                </div>
            `);
            return;
        }

        let html = '';
        programs.forEach(function(program) {
            const iconClass = getIconForProgramType(program.program_type);
            const colorClass = getColorForProgramType(program.program_type);

            html += `
                <div class="program-card ${colorClass}" data-program='${JSON.stringify(program)}'>
                    <div class="program-icon">
                        <i class="${iconClass}"></i>
                    </div>
                    <div class="program-badge">${formatProgramType(program.program_type)}</div>
                    <h3 class="program-title">${program.program_name}</h3>
                    <p class="program-description">${truncateText(program.description, 120)}</p>
                    
                    <div class="program-meta">
                        ${program.coverage_area ? `
                            <div class="meta-item">
                                <i class="fas fa-map-marked-alt"></i>
                                <span>${program.coverage_area}</span>
                            </div>
                        ` : ''}
                        ${program.status ? `
                            <div class="meta-item">
                                <span class="status-badge ${program.status.toLowerCase()}">${program.status}</span>
                            </div>
                        ` : ''}
                    </div>
                    
                    <button class="btn-learn-more">
                        Learn More
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            `;
        });

        $('#programsGrid').html(html);
    }

    function renderPreparedness(preparedness) {
        if (!preparedness || preparedness.length === 0) {
            $('#preparednessGrid').html(`
                <div class="empty-state">
                    <i class="fas fa-folder-open"></i>
                    <p>No guides available.</p>
                </div>
            `);
            return;
        }

        let html = '';
        preparedness.forEach(function(prep) {
            const iconClass = getIconForDisasterType(prep.disaster_type);
            const colorClass = getColorForDisasterType(prep.disaster_type);

            html += `
                <div class="preparedness-card ${colorClass}" data-preparedness='${JSON.stringify(prep)}'>
                    <div class="prep-icon">
                        <i class="${iconClass}"></i>
                    </div>
                    <h3 class="prep-title">${formatDisasterType(prep.disaster_type)}</h3>
                    <p class="prep-preview">${truncateText(prep.preparedness_guide, 100)}</p>
                    
                    ${prep.emergency_hotlines ? `
                        <div class="hotline-preview">
                            <i class="fas fa-phone-alt"></i>
                            <span>Emergency Hotlines Available</span>
                        </div>
                    ` : ''}
                    
                    <button class="btn-view-guide">
                        View Full Guide
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            `;
        });

        $('#preparednessGrid').html(html);
    }

    function extractFacilityTypes(facilities) {
        const typeSet = new Set();
        facilities.forEach(function(facility) {
            if (facility.facility_type) {
                typeSet.add(facility.facility_type);
            }
        });

        const types = Array.from(typeSet).sort();
        renderFacilityTypeTabs(types);
    }

    function renderFacilityTypeTabs(types) {
        let html = '<button class="filter-tab active" data-type="">All Facilities</button>';
        
        types.forEach(function(type) {
            html += `<button class="filter-tab" data-type="${type}">${formatFacilityType(type)}</button>`;
        });

        $('#facilityTypeTabs').html(html);
    }

    function renderFacilities(facilities) {
        if (!facilities || facilities.length === 0) {
            $('#facilitiesGrid').html(`
                <div class="empty-state">
                    <i class="fas fa-folder-open"></i>
                    <p>No facilities found.</p>
                </div>
            `);
            return;
        }

        let html = '';
        facilities.forEach(function(facility) {
            html += `
                <div class="facility-card">
                    <div class="facility-type-badge">${formatFacilityType(facility.facility_type)}</div>
                    <h3 class="facility-name">${facility.name}</h3>
                    
                    <div class="facility-details">
                        ${facility.municipality ? `
                            <div class="detail-row">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>${facility.municipality}</span>
                            </div>
                        ` : ''}
                        ${facility.address ? `
                            <div class="detail-row">
                                <i class="fas fa-location-arrow"></i>
                                <span>${facility.address}</span>
                            </div>
                        ` : ''}
                        ${facility.capacity ? `
                            <div class="detail-row">
                                <i class="fas fa-users"></i>
                                <span>Capacity: ${facility.capacity}</span>
                            </div>
                        ` : ''}
                        ${facility.contact_number ? `
                            <div class="detail-row">
                                <i class="fas fa-phone"></i>
                                <span>${facility.contact_number}</span>
                            </div>
                        ` : ''}
                    </div>
                </div>
            `;
        });

        $('#facilitiesGrid').html(html);
    }

    function renderIncidents(incidents) {
        if (!incidents || incidents.length === 0) {
            $('#incidentsTimeline').html(`
                <div class="empty-state">
                    <i class="fas fa-folder-open"></i>
                    <p>No incident history available.</p>
                </div>
            `);
            return;
        }

        let html = '';
        incidents.forEach(function(incident) {
            html += `
                <div class="incident-card">
                    <div class="incident-date">${formatDate(incident.occurrence_date)}</div>
                    <div class="incident-content">
                        <div class="incident-type-badge">${formatDisasterType(incident.incident_type)}</div>
                        <h3 class="incident-name">${incident.incident_name}</h3>
                        
                        ${incident.affected_areas ? `
                            <p class="incident-affected">
                                <strong>Affected Areas:</strong> ${incident.affected_areas}
                            </p>
                        ` : ''}
                        
                        ${incident.response_actions ? `
                            <div class="incident-response">
                                <strong>Response Actions:</strong>
                                <p>${truncateText(incident.response_actions, 200)}</p>
                            </div>
                        ` : ''}
                        
                        ${incident.casualties || incident.damages_estimated ? `
                            <div class="incident-stats">
                                ${incident.casualties ? `<span><i class="fas fa-heartbeat"></i> ${incident.casualties} casualties</span>` : ''}
                                ${incident.damages_estimated ? `₱ ${incident.damages_estimated}</span>` : ''}
                            </div>
                        ` : ''}
                    </div>
                </div>
            `;
        });

        $('#incidentsTimeline').html(html);
    }

    function showProgramModal(program) {
        const iconClass = getIconForProgramType(program.program_type);
        const colorClass = getColorForProgramType(program.program_type);

        const modalBody = `
            <div class="modal-detail ${colorClass}">
                <div class="modal-header">
                    <div class="modal-icon">
                        <i class="${iconClass}"></i>
                    </div>
                    <div>
                        <div class="modal-badge">${formatProgramType(program.program_type)}</div>
                        <h2 class="modal-title">${program.program_name}</h2>
                    </div>
                </div>

                <div class="modal-body-content">
                    <div class="detail-section">
                        <h4><i class="fas fa-info-circle"></i> Description</h4>
                        <p>${program.description}</p>
                    </div>

                    ${program.objectives ? `
                        <div class="detail-section">
                            <h4><i class="fas fa-bullseye"></i> Objectives</h4>
                            <p>${program.objectives}</p>
                        </div>
                    ` : ''}

                    ${program.coverage_area ? `
                        <div class="detail-section">
                            <h4><i class="fas fa-map-marked-alt"></i> Coverage Area</h4>
                            <p>${program.coverage_area}</p>
                        </div>
                    ` : ''}

                    ${program.implementation_date ? `
                        <div class="detail-section">
                            <h4><i class="fas fa-calendar"></i> Implementation Date</h4>
                            <p>${formatDate(program.implementation_date)}</p>
                        </div>
                    ` : ''}
                </div>
            </div>
        `;

        $('#programModalBody').html(modalBody);
        $('#programModal').addClass('active');
    }

    function showPreparednessModal(prep) {
        const iconClass = getIconForDisasterType(prep.disaster_type);
        const colorClass = getColorForDisasterType(prep.disaster_type);

        const modalBody = `
            <div class="modal-detail ${colorClass}">
                <div class="modal-header">
                    <div class="modal-icon">
                        <i class="${iconClass}"></i>
                    </div>
                    <h2 class="modal-title">${formatDisasterType(prep.disaster_type)} Preparedness Guide</h2>
                </div>

                <div class="modal-body-content">
                    <div class="detail-section">
                        <h4><i class="fas fa-shield-alt"></i> Preparedness Guide</h4>
                        <p>${prep.preparedness_guide}</p>
                    </div>

                    ${prep.emergency_hotlines ? `
                        <div class="detail-section hotlines">
                            <h4><i class="fas fa-phone-alt"></i> Emergency Hotlines</h4>
                            <pre>${prep.emergency_hotlines}</pre>
                        </div>
                    ` : ''}

                    ${prep.evacuation_centers ? `
                        <div class="detail-section">
                            <h4><i class="fas fa-home"></i> Evacuation Centers</h4>
                            <p>${prep.evacuation_centers}</p>
                        </div>
                    ` : ''}

                    ${prep.relief_procedures ? `
                        <div class="detail-section">
                            <h4><i class="fas fa-hands-helping"></i> Relief Procedures</h4>
                            <p>${prep.relief_procedures}</p>
                        </div>
                    ` : ''}
                </div>
            </div>
        `;

        $('#preparednessModalBody').html(modalBody);
        $('#preparednessModal').addClass('active');
    }

    // Helper functions
    function truncateText(text, maxLength) {
        if (!text) return '';
        if (text.length <= maxLength) return text;
        return text.substring(0, maxLength) + '...';
    }

    function formatDate(dateString) {
        if (!dateString) return '';
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
    }

    function formatProgramType(type) {
        if (!type) return '';
        
        // Handle both formats: "WASTE MANAGEMENT" and "waste_management"
        const formatted = type.replace(/_/g, ' ')
                             .toLowerCase()
                             .split(' ')
                             .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                             .join(' ');
        return formatted;
    }

    function formatDisasterType(type) {
        if (!type) return '';
        return type.charAt(0).toUpperCase() + type.slice(1).toLowerCase();
    }

    function formatFacilityType(type) {
        if (!type) return '';
        return type.split('_').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
    }

    function getIconForProgramType(type) {
        if (!type) return 'fas fa-tree';
        
        const typeNormalized = type.toLowerCase().replace(' ', '_');
        const icons = {
            'conservation': 'fas fa-leaf',
            'pollution_control': 'fas fa-wind',
            'waste_management': 'fas fa-recycle'
        };
        return icons[typeNormalized] || 'fas fa-tree';
    }

    function getColorForProgramType(type) {
        if (!type) return 'color-green';
        
        const typeNormalized = type.toLowerCase().replace(' ', '_');
        const colors = {
            'conservation': 'color-green',
            'pollution_control': 'color-blue',
            'waste_management': 'color-orange'
        };
        return colors[typeNormalized] || 'color-green';
    }

    function getIconForDisasterType(type) {
        if (!type) return 'fas fa-exclamation-triangle';
        
        const icons = {
            'flood': 'fas fa-water',
            'typhoon': 'fas fa-wind',
            'earthquake': 'fas fa-house-damage',
            'fire': 'fas fa-fire',
            'landslide': 'fas fa-mountain'
        };
        return icons[type.toLowerCase()] || 'fas fa-exclamation-triangle';
    }

    function getColorForDisasterType(type) {
        if (!type) return 'color-red';
        
        const colors = {
            'flood': 'color-blue',
            'typhoon': 'color-gray',
            'earthquake': 'color-brown',
            'fire': 'color-red',
            'landslide': 'color-brown'
        };
        return colors[type.toLowerCase()] || 'color-red';
    }
});
</script>
</body>
</html>