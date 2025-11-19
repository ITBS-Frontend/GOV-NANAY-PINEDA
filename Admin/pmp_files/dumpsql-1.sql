-- Add columns to existing projects table
ALTER TABLE projects 
ADD COLUMN full_description TEXT,
ADD COLUMN objectives TEXT,
ADD COLUMN impact TEXT,
ADD COLUMN location VARCHAR(255),
ADD COLUMN start_date DATE,
ADD COLUMN end_date DATE,
ADD COLUMN status VARCHAR(50) DEFAULT 'Completed';

-- Create project details/highlights table
CREATE TABLE project_highlights (
    id SERIAL PRIMARY KEY,
    project_id INTEGER REFERENCES projects(id) ON DELETE CASCADE,
    highlight_text TEXT NOT NULL,
    display_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create project gallery table
CREATE TABLE project_gallery (
    id SERIAL PRIMARY KEY,
    project_id INTEGER REFERENCES projects(id) ON DELETE CASCADE,
    image_path VARCHAR(500) NOT NULL,
    caption VARCHAR(255),
    display_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Update sample projects with full details
UPDATE projects SET
    full_description = 'The Provincial Hospital Modernization Program represents a comprehensive transformation of healthcare infrastructure across Pampanga. This initiative modernized 15 provincial hospitals with state-of-the-art medical equipment, expanded bed capacity by 85%, and introduced specialized medical services including cancer treatment centers, dialysis units, and emergency trauma care facilities. The program ensures that every Kapampangan has access to quality healthcare regardless of their location or economic status.',
    objectives = 'To provide world-class healthcare facilities accessible to all residents of Pampanga, reduce patient referrals to Metro Manila, and establish Pampanga as a medical hub in Central Luzon.',
    impact = 'Over 500,000 patients served annually, 85% increase in hospital capacity, 95% reduction in patient referrals to Metro Manila, creation of 2,000 healthcare jobs.',
    location = 'Province-wide, Pampanga',
    start_date = '2020-01-15',
    end_date = '2023-12-31',
    status = 'Completed'
WHERE id = 1;

UPDATE projects SET
    full_description = 'The Pampanga Flood Control System is a comprehensive disaster management infrastructure designed to protect communities from seasonal flooding. The system includes 125 kilometers of flood control dikes, 48 pumping stations with modern technology, river improvement projects, and an integrated early warning system. This multi-billion peso project has transformed flood-prone areas into safe, livable communities.',
    objectives = 'To eliminate flooding in vulnerable areas, protect lives and properties, enable year-round economic activities, and provide sustainable flood management solutions.',
    impact = '850,000 residents protected, 95% reduction in flood incidents, zero flood-related casualties since implementation, ₱15 billion in prevented damages annually.',
    location = 'Major river systems and flood-prone areas across Pampanga',
    start_date = '2019-06-01',
    end_date = '2024-12-31',
    status = 'Ongoing'
WHERE id = 2;

UPDATE projects SET
    full_description = 'The Kapampangan Scholarship Program provides free college education to deserving students from low-income families. The program covers full tuition, books, allowances, and even living expenses for students studying in priority courses aligned with industry needs. Since its inception, the program has produced 25,000 graduates who are now employed in various professional fields, breaking the cycle of poverty in their families.',
    objectives = 'To provide equal educational opportunities, produce skilled professionals aligned with industry needs, and empower families through education.',
    impact = '25,000 college graduates, 95% employment rate, average family income increased by 300%, produced doctors, engineers, teachers, and business leaders.',
    location = 'Province-wide scholarship program',
    start_date = '2018-01-01',
    status = 'Ongoing'
WHERE id = 3;

UPDATE projects SET
    full_description = 'The Pampanga Business Hub program creates a comprehensive ecosystem for business development and job creation. It includes business incubation centers, skills training facilities, access to microfinance, trade fairs and market linkages, and investment promotion initiatives. The program has successfully attracted ₱45 billion in investments and supported over 15,000 MSMEs.',
    objectives = 'To establish Pampanga as Central Luzon''s premier investment destination, create sustainable livelihood opportunities, and support MSME growth.',
    impact = '180,000 jobs created, 15,000 MSMEs supported, ₱45 billion in attracted investments, 40% increase in provincial GDP.',
    location = 'Province-wide with focus on industrial zones',
    start_date = '2021-03-15',
    status = 'Ongoing'
WHERE id = 4;

-- Insert sample highlights
INSERT INTO project_highlights (project_id, highlight_text, display_order) VALUES
(1, '15 hospitals modernized with state-of-the-art equipment', 1),
(1, '85% increase in bed capacity and patient services', 2),
(1, 'Cancer treatment center and dialysis units established', 3),
(1, '2,000 healthcare jobs created', 4),
(1, '500,000 patients served annually', 5),

(2, '125 kilometers of flood control dikes constructed', 1),
(2, '48 modern pumping stations installed', 2),
(2, 'Integrated early warning system implemented', 3),
(2, '850,000 residents protected from flooding', 4),
(2, '95% reduction in flood incidents', 5),

(3, '25,000 college graduates produced', 1),
(3, 'Full scholarship including tuition, books, and allowances', 2),
(3, '95% employment rate among graduates', 3),
(3, 'Priority courses aligned with industry needs', 4),
(3, 'Family income increased by average of 300%', 5),

(4, '180,000 jobs created across various sectors', 1),
(4, '15,000 MSMEs provided with support and training', 2),
(4, '₱45 billion in investments attracted', 3),
(4, 'Business incubation centers established', 4),
(4, '40% increase in provincial GDP', 5);