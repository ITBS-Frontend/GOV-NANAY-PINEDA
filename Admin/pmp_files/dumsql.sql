-- User levels table
CREATE TABLE user_levels (
    user_level_id INTEGER PRIMARY KEY,
    user_level_name VARCHAR(100) NOT NULL,
    hierarchy INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Users table
CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    user_level_id INTEGER DEFAULT 0,
    activated BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_level_id) REFERENCES user_levels(user_level_id)
);

-- User permissions table
CREATE TABLE user_permissions (
    permission_id SERIAL PRIMARY KEY,
    user_level_id INTEGER,
    table_name VARCHAR(100) NOT NULL,
    permission INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_level_id) REFERENCES user_levels(user_level_id) ON DELETE CASCADE,
    UNIQUE(user_level_id, table_name)
);
-- Drop tables if they exist (in reverse order due to foreign keys)
DROP TABLE IF EXISTS project_stats CASCADE;
DROP TABLE IF EXISTS projects CASCADE;
DROP TABLE IF EXISTS political_journey CASCADE;
DROP TABLE IF EXISTS categories CASCADE;

-- Categories table for project classification
CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    color_code VARCHAR(7) DEFAULT '#3B82F6',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Projects table for governance portfolio items
CREATE TABLE projects (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    category_id INTEGER REFERENCES categories(id),
    project_number INTEGER,
    featured_image VARCHAR(500),
    is_featured BOOLEAN DEFAULT FALSE,
    project_date DATE,
    budget_amount DECIMAL(15,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Project statistics table for metrics display
CREATE TABLE project_stats (
    id SERIAL PRIMARY KEY,
    project_id INTEGER REFERENCES projects(id) ON DELETE CASCADE,
    stat_label VARCHAR(100) NOT NULL,
    stat_value VARCHAR(50) NOT NULL,
    stat_description VARCHAR(200),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Political journey/timeline table
CREATE TABLE political_journey (
    id SERIAL PRIMARY KEY,
    position_title VARCHAR(200) NOT NULL,
    start_year INTEGER NOT NULL,
    end_year INTEGER,
    duration_display VARCHAR(50),
    description TEXT,
    is_current BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample categories
INSERT INTO categories (name, color_code) VALUES
('Healthcare', '#3B82F6'),
('Infrastructure', '#DC2626'),
('Education', '#EA580C'),
('Social Services', '#059669'),
('Economic Development', '#EA580C');

-- Insert sample projects
INSERT INTO projects (title, description, category_id, project_number, is_featured, project_date, budget_amount) VALUES
('Provincial Hospital Modernization', 
 'Upgraded 15 provincial hospitals with modern equipment, expanded capacity, and specialized medical services, ensuring quality healthcare access for all Kapampangans.',
 1, 1, TRUE, '2020-01-01', 2500000000.00),

('Pampanga Flood Control System',
 'Comprehensive flood management protecting 850,000 residents through dikes, pumping stations, and early warning systems.',
 2, 2, TRUE, '2019-06-01', 8000000000.00),

('Kapampangan Scholarship Program',
 'Provincial scholarship providing free college education to deserving students, producing 25,000 graduates across various professional fields.',
 3, 3, TRUE, '2018-01-01', 1800000000.00),

('Pampanga Business Hub',
 'Comprehensive business development program creating job opportunities, supporting MSMEs, and establishing Pampanga as Central Luzon''s premier investment destination.',
 5, 4, TRUE, '2021-03-01', 4500000000.00);

-- Insert sample project statistics
INSERT INTO project_stats (project_id, stat_label, stat_value, stat_description) VALUES
(1, 'HOSPITALS', '15', ''),
(1, 'CAPACITY+', '85%', ''),
(1, 'INVESTMENT', '₱2.5B', ''),

(2, 'PROTECTED', '850K', ''),
(2, 'FLOOD CONTROL', '125km', ''),
(2, 'STATIONS', '48', ''),

(3, 'GRADUATES', '25K', ''),
(3, 'EMPLOYED', '95%', ''),
(3, 'FUND', '₱1.8B', ''),

(4, 'JOBS CREATED', '180K', ''),
(4, 'MSMES SUPPORTED', '15K', ''),
(4, 'INVESTMENTS ATTRACTED', '₱45B', '');

-- Insert political journey data
INSERT INTO political_journey (position_title, start_year, end_year, duration_display, description, is_current) VALUES
('Governor of Pampanga', 2010, 2019, '2010-2019',
 'First term as Governor, implementing major reforms in healthcare, education, and economic development. Established Pampanga as a progressive province through innovative policies and strategic partnerships.',
 FALSE),

('Vice Governor', 2019, 2025, '2019-2025',
 'Served as Vice Governor under her son Dennis Pineda, continuing her public service while mentoring the next generation of leaders and championing women''s rights and senior citizen welfare.',
 TRUE);