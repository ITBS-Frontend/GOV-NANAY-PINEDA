-- Facility Types
CREATE TABLE facility_types (
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL UNIQUE,
    category VARCHAR(50), -- 'government', 'emergency', 'health', etc.
    icon_class VARCHAR(100),
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tourism Facility Types
CREATE TABLE tourism_facility_types (
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL UNIQUE,
    icon_class VARCHAR(100),
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Ownership Types
CREATE TABLE ownership_types (
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL UNIQUE,
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE
);

-- Program Types
CREATE TABLE program_types (
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL UNIQUE,
    category VARCHAR(50),
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE
);

-- Update existing tables to use foreign keys
ALTER TABLE government_facilities 
DROP COLUMN facility_type,
ADD COLUMN facility_type_id INTEGER REFERENCES facility_types(id);

ALTER TABLE tourism_facilities
DROP COLUMN facility_type,
ADD COLUMN facility_type_id INTEGER REFERENCES tourism_facility_types(id),
DROP COLUMN ownership,
ADD COLUMN ownership_type_id INTEGER REFERENCES ownership_types(id);

-- Insert default data
INSERT INTO facility_types (type_name, category, display_order) VALUES
('Hospital', 'health', 1),
('School', 'education', 2),
('Government Office', 'government', 3),
('Barangay Hall', 'government', 4);

INSERT INTO tourism_facility_types (type_name, display_order) VALUES
('Hotel', 1),
('Restaurant', 2),
('Transport Service', 3),
('Tour Operator', 4);

INSERT INTO ownership_types (type_name, display_order) VALUES
('Government', 1),
('Private', 2);

-- ===========================================
-- LOOKUP TABLES FOR ALL TYPE FIELDS
-- ===========================================

-- 1. Demographics Data Types (demographics_data)
CREATE TABLE demographics_types (
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL UNIQUE,
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO demographics_types (type_name, display_order) VALUES
('Population', 1),
('Age Distribution', 2),
('Literacy Rate', 3);

-- 2. Geographic Info Types (geographic_info)
CREATE TABLE geographic_info_types (
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL UNIQUE,
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO geographic_info_types (type_name, display_order) VALUES
('Municipality', 1),
('Landmark', 2),
('Boundary', 3);

-- 3. Project Types (projects)
CREATE TABLE project_types (
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL UNIQUE,
    icon_class VARCHAR(100),
    color_code VARCHAR(7) DEFAULT '#3B82F6',
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO project_types (type_name, display_order) VALUES
('Governance', 1),
('Infrastructure', 2),
('Economic', 3),
('Environmental', 4);

-- 4. Environmental Program Types (environmental_programs)
CREATE TABLE environmental_program_types (
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL UNIQUE,
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO environmental_program_types (type_name, display_order) VALUES
('Conservation', 1),
('Pollution Control', 2),
('Waste Management', 3);

-- 5. Disaster Types (disaster_preparedness, disaster_incidents)
CREATE TABLE disaster_types (
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL UNIQUE,
    icon_class VARCHAR(100),
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO disaster_types (type_name, display_order) VALUES
('Flood', 1),
('Typhoon', 2),
('Earthquake', 3);

-- 6. Emergency Facility Types (emergency_facilities)
CREATE TABLE emergency_facility_types (
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL UNIQUE,
    icon_class VARCHAR(100),
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO emergency_facility_types (type_name, display_order) VALUES
('Evacuation Center', 1),
('Fire Station', 2),
('Police Station', 3);

-- 7. Category Types (categories)
CREATE TABLE category_types (
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL UNIQUE,
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO category_types (type_name, display_order) VALUES
('Project', 1),
('News', 2),
('Tourism', 3),
('Service', 4);

-- 8. News Types (news_posts)
CREATE TABLE news_types (
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL UNIQUE,
    icon_class VARCHAR(100),
    color_code VARCHAR(7) DEFAULT '#3B82F6',
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO news_types (type_name, display_order) VALUES
('General', 1),
('Provincial Update', 2),
('Tourism', 3),
('Health', 4),
('Disaster', 5);

-- 9. Status Types (health_programs, environmental_programs)
CREATE TABLE status_types (
    id SERIAL PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL UNIQUE,
    color_code VARCHAR(7) DEFAULT '#3B82F6',
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO status_types (type_name, color_code, display_order) VALUES
('Active', '#059669', 1),
('Completed', '#3B82F6', 2),
('Planned', '#F59E0B', 3);

-- 10. Difficulty Levels (tourism_activities)
CREATE TABLE difficulty_levels (
    id SERIAL PRIMARY KEY,
    level_name VARCHAR(50) NOT NULL UNIQUE,
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO difficulty_levels (level_name, display_order) VALUES
('Easy', 1),
('Moderate', 2),
('Challenging', 3);

-- ===========================================
-- UPDATE TABLES TO USE FOREIGN KEYS
-- ===========================================

ALTER TABLE demographics_data
DROP COLUMN data_type,
ADD COLUMN data_type_id INTEGER REFERENCES demographics_types(id);

ALTER TABLE geographic_info
DROP COLUMN info_type,
ADD COLUMN info_type_id INTEGER REFERENCES geographic_info_types(id);

ALTER TABLE program_statistics
DROP COLUMN program_type,
ADD COLUMN program_type_id INTEGER REFERENCES program_types(id);

ALTER TABLE projects
DROP COLUMN project_type,
ADD COLUMN project_type_id INTEGER REFERENCES project_types(id);

ALTER TABLE environmental_programs
DROP COLUMN program_type,
ADD COLUMN program_type_id INTEGER REFERENCES environmental_program_types(id);

ALTER TABLE disaster_preparedness
DROP COLUMN disaster_type,
ADD COLUMN disaster_type_id INTEGER REFERENCES disaster_types(id);

ALTER TABLE disaster_incidents
DROP COLUMN incident_type,
ADD COLUMN incident_type_id INTEGER REFERENCES disaster_types(id);

ALTER TABLE emergency_facilities
DROP COLUMN facility_type,
ADD COLUMN facility_type_id INTEGER REFERENCES emergency_facility_types(id);

ALTER TABLE categories
DROP COLUMN category_type,
ADD COLUMN category_type_id INTEGER REFERENCES category_types(id);

ALTER TABLE news_posts
DROP COLUMN news_type,
ADD COLUMN news_type_id INTEGER REFERENCES news_types(id);

ALTER TABLE health_programs
DROP COLUMN status,
ADD COLUMN status_id INTEGER REFERENCES status_types(id);

ALTER TABLE environmental_programs
DROP COLUMN status,
ADD COLUMN status_id INTEGER REFERENCES status_types(id);

ALTER TABLE tourism_activities
DROP COLUMN difficulty_level,
ADD COLUMN difficulty_level_id INTEGER REFERENCES difficulty_levels(id);


-- ===========================================
-- UPDATE SAMPLE DATA TO USE FOREIGN KEY IDs
-- ===========================================

-- 1. DEMOGRAPHICS DATA - Update to use data_type_id
DELETE FROM demographics_data; -- Clear old data first

-- Get the IDs first, then insert
INSERT INTO demographics_data (data_type_id, label, value, year, source, display_order) VALUES
((SELECT id FROM demographics_types WHERE type_name = 'Population'), 'Total Population', '2,609,744', 2020, 'Philippine Statistics Authority', 1),
((SELECT id FROM demographics_types WHERE type_name = 'Population'), 'Population Growth Rate', '1.02%', 2020, 'Philippine Statistics Authority', 2),
((SELECT id FROM demographics_types WHERE type_name = 'Population'), 'Population Density', '1,265/km²', 2020, 'Philippine Statistics Authority', 3),
((SELECT id FROM demographics_types WHERE type_name = 'Age Distribution'), 'Age 0-14', '28.5%', 2020, 'PSA Census', 4),
((SELECT id FROM demographics_types WHERE type_name = 'Age Distribution'), 'Age 15-64', '65.2%', 2020, 'PSA Census', 5),
((SELECT id FROM demographics_types WHERE type_name = 'Age Distribution'), 'Age 65+', '6.3%', 2020, 'PSA Census', 6),
((SELECT id FROM demographics_types WHERE type_name = 'Literacy Rate'), 'Overall Literacy Rate', '98.7%', 2020, 'Department of Education', 7);

-- 2. GEOGRAPHIC INFO - Update to use info_type_id
DELETE FROM geographic_info;

INSERT INTO geographic_info (info_type_id, name, description, coordinates, area_sqkm, population) VALUES
((SELECT id FROM geographic_info_types WHERE type_name = 'Landmark'), 'Mount Arayat', 'An extinct stratovolcano and the most prominent geographic landmark in Pampanga', '15.1986,120.7425', NULL, NULL),
((SELECT id FROM geographic_info_types WHERE type_name = 'Landmark'), 'Pampanga River', 'The second largest river in Luzon, spanning 260 kilometers', '15.2000,120.6500', NULL, NULL),
((SELECT id FROM geographic_info_types WHERE type_name = 'Boundary'), 'Northern Boundary', 'Bordered by Tarlac and Nueva Ecija', NULL, NULL, NULL),
((SELECT id FROM geographic_info_types WHERE type_name = 'Boundary'), 'Southern Boundary', 'Bordered by Bataan and Bulacan', NULL, NULL, NULL);

-- 3. ENVIRONMENTAL PROGRAMS - Update to use program_type_id and status_id
DELETE FROM environmental_programs;

INSERT INTO environmental_programs (program_name, program_type_id, description, objectives, coverage_area, implementation_date, status_id) VALUES
('Pampanga River Rehabilitation Project', 
 (SELECT id FROM environmental_program_types WHERE type_name = 'Conservation'), 
 'Comprehensive river cleanup and ecosystem restoration program', 
 'To restore the health of Pampanga River, improve water quality, and protect aquatic biodiversity', 
 'Entire Pampanga River system', 
 '2020-01-15', 
 (SELECT id FROM status_types WHERE type_name = 'Active')),

('Lahar Reforestation Initiative', 
 (SELECT id FROM environmental_program_types WHERE type_name = 'Conservation'), 
 'Massive tree-planting program in lahar-affected areas', 
 'To rehabilitate lahar wastelands through reforestation', 
 'Mt. Pinatubo affected areas', 
 '2019-06-01', 
 (SELECT id FROM status_types WHERE type_name = 'Active')),

('Zero Waste Pampanga', 
 (SELECT id FROM environmental_program_types WHERE type_name = 'Waste Management'), 
 'Province-wide waste segregation and recycling program', 
 'To achieve zero waste in all municipalities', 
 'All 19 municipalities', 
 '2021-01-01', 
 (SELECT id FROM status_types WHERE type_name = 'Active')),

('Clean Air Monitoring Program', 
 (SELECT id FROM environmental_program_types WHERE type_name = 'Pollution Control'), 
 'Air quality monitoring and emission control', 
 'To maintain healthy air quality standards', 
 'Major urban areas and industrial zones', 
 '2018-03-01', 
 (SELECT id FROM status_types WHERE type_name = 'Active'));

-- 4. DISASTER PREPAREDNESS - Update to use disaster_type_id
DELETE FROM disaster_preparedness;

INSERT INTO disaster_preparedness (disaster_type_id, preparedness_guide, emergency_hotlines, evacuation_centers, relief_procedures, display_order) VALUES
((SELECT id FROM disaster_types WHERE type_name = 'Flood'), 
 'Monitor weather updates. Prepare emergency kit with food, water, medicine, flashlight, and important documents.', 
 'Provincial DRRM: (045) 961-3333, NDRRMC: 911, Red Cross: (045) 961-1355', 
 'List of 150 designated evacuation centers in all municipalities', 
 'Report to designated evacuation center. Register with barangay officials.', 
 1),

((SELECT id FROM disaster_types WHERE type_name = 'Typhoon'), 
 'Secure loose objects. Stock up on food and water. Stay indoors during the typhoon.', 
 'Provincial DRRM: (045) 961-3333, PAGASA: (045) 961-2222', 
 'Municipal gymnasiums, schools, barangay halls', 
 'Follow evacuation orders. Bring emergency supplies.', 
 2),

((SELECT id FROM disaster_types WHERE type_name = 'Earthquake'), 
 'Duck, Cover, and Hold. Identify safe spots in your home. Prepare earthquake emergency kit.', 
 'Provincial DRRM: (045) 961-3333, PHIVOLCS: (045) 961-4444', 
 'Open spaces, designated assembly areas', 
 'Move to open areas. Stay away from buildings.', 
 3);

-- 5. DISASTER INCIDENTS - Update to use incident_type_id
DELETE FROM disaster_incidents;

INSERT INTO disaster_incidents (incident_type_id, incident_name, occurrence_date, affected_areas, casualties, damages_estimated, response_actions, lessons_learned) VALUES
((SELECT id FROM disaster_types WHERE type_name = 'Flood'), 
 'Southwest Monsoon Flooding 2023', 
 '2023-07-15', 
 'San Fernando, Guagua, Lubao, Apalit', 
 0, 
 50000000.00, 
 'Immediate evacuation of 5,000 families. Relief operations conducted.', 
 'Need for improved drainage systems in low-lying areas.');

-- 6. EMERGENCY FACILITIES - Update to use facility_type_id
DELETE FROM emergency_facilities;

INSERT INTO emergency_facilities (facility_type_id, name, municipality, address, capacity, contact_number, coordinates, is_active) VALUES
((SELECT id FROM emergency_facility_types WHERE type_name = 'Evacuation Center'), 
 'Angeles City Sports Complex', 
 'Angeles City', 
 'Pandan Street, Angeles City', 
 2000, 
 '(045) 322-5555', 
 '15.1450,120.5887', 
 true),

((SELECT id FROM emergency_facility_types WHERE type_name = 'Fire Station'), 
 'San Fernando City Fire Station', 
 'San Fernando', 
 'MacArthur Highway, San Fernando', 
 NULL, 
 '(045) 961-1111', 
 '15.0285,120.6897', 
 true),

((SELECT id FROM emergency_facility_types WHERE type_name = 'Police Station'), 
 'Mabalacat City Police Station', 
 'Mabalacat', 
 'Rizal Street, Mabalacat', 
 NULL, 
 '(045) 331-2222', 
 '15.2230,120.5710', 
 true);

-- 7. NEWS POSTS - Update to use news_type_id  
-- If you have existing news_posts with news_type as VARCHAR:
UPDATE news_posts 
SET news_type_id = (SELECT id FROM news_types WHERE type_name = 'General')
WHERE news_type_id IS NULL;

UPDATE news_posts 
SET news_type_id = (SELECT id FROM news_types WHERE type_name = 'Provincial Update')
WHERE news_type = 'provincial_update';

UPDATE news_posts 
SET news_type_id = (SELECT id FROM news_types WHERE type_name = 'Tourism')
WHERE news_type = 'tourism';

UPDATE news_posts 
SET news_type_id = (SELECT id FROM news_types WHERE type_name = 'Health')
WHERE news_type = 'health';

UPDATE news_posts 
SET news_type_id = (SELECT id FROM news_types WHERE type_name = 'Disaster')
WHERE news_type = 'disaster';

-- 8. CATEGORIES - Update to use category_type_id
UPDATE categories 
SET category_type_id = (SELECT id FROM category_types WHERE type_name = 'Project')
WHERE category_type = 'project' OR category_type IS NULL;

UPDATE categories 
SET category_type_id = (SELECT id FROM category_types WHERE type_name = 'News')
WHERE category_type = 'news';

UPDATE categories 
SET category_type_id = (SELECT id FROM category_types WHERE type_name = 'Tourism')
WHERE category_type = 'tourism';

UPDATE categories 
SET category_type_id = (SELECT id FROM category_types WHERE type_name = 'Service')
WHERE category_type = 'service';

-- 9. HEALTH PROGRAMS - Update to use status_id
UPDATE health_programs 
SET status_id = (SELECT id FROM status_types WHERE type_name = 'Active')
WHERE status = 'Active';

UPDATE health_programs 
SET status_id = (SELECT id FROM status_types WHERE type_name = 'Completed')
WHERE status = 'Completed';

UPDATE health_programs 
SET status_id = (SELECT id FROM status_types WHERE type_name = 'Planned')
WHERE status = 'Planned';