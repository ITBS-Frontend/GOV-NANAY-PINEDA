<?php
namespace PHPMaker2024\Gov_Nanay_Pineda;

// Page object
$CustomDashboard = &$Page;
$Page->PageID = "dashboard";

// Get database connection
$conn = Conn();

// Stats queries using direct query execution
$totalProjects = $conn->executeQuery("SELECT COUNT(*) FROM projects")->fetchOne() ?: 0;
$featuredProjects = $conn->executeQuery("SELECT COUNT(*) FROM projects WHERE is_featured = TRUE")->fetchOne() ?: 0;
$totalCategories = $conn->executeQuery("SELECT COUNT(*) FROM categories")->fetchOne() ?: 0;

// Tourism stats
$totalDestinations = $conn->executeQuery("SELECT COUNT(*) FROM tourism_destinations WHERE is_active = TRUE")->fetchOne() ?: 0;

// Recent projectsf
$sql = "SELECT id, title, project_date, budget_amount FROM projects ORDER BY created_at DESC LIMIT 5";
$recentProjects = $conn->executeQuery($sql)->fetchAllAssociative();

// Category distribution
$sql = "SELECT c.name, COUNT(p.id) as count FROM categories c LEFT JOIN projects p ON c.id = p.category_id GROUP BY c.name ORDER BY count DESC";
$categoryStats = $conn->executeQuery($sql)->fetchAllAssociative();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        .dashboard-container { 
            padding: 20px; 
        }
        .stats-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 20px; 
            margin-bottom: 30px;
        }
        .stat-card { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 25px; 
            border-radius: 12px;
            color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .stat-card:nth-child(2) { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .stat-card:nth-child(3) { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
        .stat-card:nth-child(4) { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }
        .stat-card:hover { transform: translateY(-5px); }
        .stat-value { font-size: 42px; font-weight: bold; margin: 10px 0; }
        .stat-label { font-size: 14px; opacity: 0.9; text-transform: uppercase; letter-spacing: 1px; }
        
        .content-grid { 
            display: grid; 
            grid-template-columns: 2fr 1fr; 
            gap: 20px; 
            margin-bottom: 20px;
        }
        
        .card { 
            background: white; 
            padding: 25px; 
            border-radius: 12px; 
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .card-title { 
            font-size: 20px; 
            font-weight: 600; 
            margin-bottom: 20px;
            color: #2d3748;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 10px;
        }
        
        .recent-table { width: 100%; border-collapse: collapse; }
        .recent-table th { 
            text-align: left; 
            padding: 12px; 
            background: #f7fafc;
            color: #4a5568;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
        }
        .recent-table td { 
            padding: 12px; 
            border-bottom: 1px solid #e2e8f0;
            color: #2d3748;
        }
        /* .recent-table tr:hover { background: #f7fafc; } */
        
        .category-item { 
            display: flex; 
            justify-content: space-between; 
            padding: 12px; 
            margin-bottom: 8px;
            background: #f7fafc;
            border-radius: 8px;
            align-items: center;
        }
        .category-name { font-weight: 500; color: #2d3748; }
        .category-count { 
            background: #667eea; 
            color: white; 
            padding: 4px 12px; 
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }
        
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        .action-btn {
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: all 0.2s;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }
        
        @media (max-width: 768px) {
            .content-grid { grid-template-columns: 1fr; }
            .stats-grid { grid-template-columns: 1fr; }
            .quick-actions { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        
        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Projects</div>
                <div class="stat-value"><?= $totalProjects ?: 0 ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Featured Projects</div>
                <div class="stat-value"><?= $featuredProjects ?: 0 ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Categories</div>
                <div class="stat-value"><?= $totalCategories ?: 0 ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Tourism Destinations</div>
                <div class="stat-value"><?= $totalDestinations ?: 0 ?></div>
            </div>
        </div>
        
        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Recent Projects -->
            <div class="card">
                <div class="card-title">Recent Projects</div>
                <?php if (!empty($recentProjects)): ?>
                <table class="recent-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recentProjects as $proj): ?>
                        <tr>
                            <td><?= htmlspecialchars($proj['title']) ?></td>
                            <td><?= $proj['project_date'] ? date('M d, Y', strtotime($proj['project_date'])) : 'N/A' ?></td>
                           
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <p style="text-align: center; color: #a0aec0; padding: 20px;">No projects yet</p>
                <?php endif; ?>
            </div>
            
            <!-- Sidebar -->
            <div>
                <!-- Category Distribution -->
                <div class="card" style="margin-bottom: 20px;">
                    <div class="card-title">Projects by Category</div>
                    <?php if (!empty($categoryStats)): ?>
                        <?php foreach ($categoryStats as $cat): ?>
                        <div class="category-item">
                            <span class="category-name"><?= htmlspecialchars($cat['name']) ?></span>
                            <span class="category-count"><?= $cat['count'] ?></span>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p style="text-align: center; color: #a0aec0; padding: 20px;">No categories yet</p>
                    <?php endif; ?>
                </div>
                
                <!-- Quick Actions -->
                <!-- <div class="card">
                    <div class="card-title">Quick Actions</div>
                    <div class="quick-actions">
                        <a href="projectsadd" class="action-btn">+ Add Project</a>
                        <a href="tourism_destinationsadd" class="action-btn">+ Add Destination</a>
                        <a href="categorieslist" class="action-btn">Manage Categories</a>
                        <a href="projectslist" class="action-btn">View All Projects</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Animate stats on load
            $('.stat-value').each(function() {
                const finalValue = parseInt($(this).text()) || 0;
                $(this).prop('Counter', 0).animate({
                    Counter: finalValue
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });
    </script>
</body>
</html>