-- News/Articles Categories
CREATE TABLE news_categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE NOT NULL,
    description TEXT,
    color_code VARCHAR(7) DEFAULT '#3B82F6',
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- News/Blog Posts
CREATE TABLE news_posts (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    excerpt TEXT,
    content TEXT NOT NULL,
    category_id INTEGER REFERENCES news_categories(id),
    featured_image VARCHAR(500),
    author_name VARCHAR(100) DEFAULT 'Office of Gov. Lilia Pineda',
    is_featured BOOLEAN DEFAULT FALSE,
    is_published BOOLEAN DEFAULT TRUE,
    published_date TIMESTAMP,
    views_count INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- News Tags
CREATE TABLE news_tags (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    slug VARCHAR(50) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- News Posts Tags (Many-to-Many)
CREATE TABLE news_post_tags (
    post_id INTEGER REFERENCES news_posts(id) ON DELETE CASCADE,
    tag_id INTEGER REFERENCES news_tags(id) ON DELETE CASCADE,
    PRIMARY KEY (post_id, tag_id)
);

-- Sample Categories
INSERT INTO news_categories (name, slug, description, color_code, display_order) VALUES
('Provincial Updates', 'provincial-updates', 'Latest news and updates from the provincial government', '#3B82F6', 1),
('Health Initiatives', 'health-initiatives', 'Healthcare programs and medical services updates', '#10B981', 2),
('Education Programs', 'education-programs', 'Scholarship and educational development news', '#F59E0B', 3),
('Infrastructure', 'infrastructure', 'Development and construction project updates', '#EF4444', 4),
('Community Events', 'community-events', 'Public events and community engagement activities', '#8B5CF6', 5);

-- Sample Tags
INSERT INTO news_tags (name, slug) VALUES
('Healthcare', 'healthcare'),
('Education', 'education'),
('Infrastructure', 'infrastructure'),
('Scholarship', 'scholarship'),
('Community Service', 'community-service'),
('COVID-19', 'covid-19'),
('Disaster Relief', 'disaster-relief'),
('Economic Development', 'economic-development');

-- Sample News Posts
INSERT INTO news_posts (title, slug, excerpt, content, category_id, published_date, is_featured) VALUES
('Governor Pineda Inaugurates New Provincial Hospital Wing', 
 'governor-pineda-inaugurates-new-provincial-hospital-wing',
 'The new hospital wing adds 200 beds and specialized medical facilities to serve more Kapampangans.',
 'Governor Lilia "Nanay" Pineda today inaugurated the new 5-story hospital wing at the Pampanga Provincial Hospital, marking another milestone in healthcare accessibility for all Kapampangans. The ₱500 million facility adds 200 beds, modern operating rooms, and specialized departments including cardiology and oncology units.\n\n"This is not just a building; this is hope for every family in Pampanga," Governor Pineda said during the inauguration ceremony attended by local officials and healthcare workers.\n\nThe new wing features state-of-the-art medical equipment, private and semi-private rooms, and a dedicated emergency trauma center. Construction began in 2022 and was completed ahead of schedule.\n\nThe facility is expected to reduce patient wait times by 60% and eliminate the need for referrals to Metro Manila for specialized treatments.',
 1, CURRENT_TIMESTAMP, TRUE),

('10,000 Students Receive Scholarship Grants', 
 '10000-students-receive-scholarship-grants',
 'Provincial scholarship program expands to cover more students pursuing priority courses.',
 'The provincial government distributed scholarship grants to 10,000 deserving students for the current academic year, representing a 25% increase from last year. The Kapampangan Scholarship Program now covers full tuition, book allowances, and monthly stipends for students in priority courses.\n\nGovernor Pineda personally handed over scholarship certificates to student representatives at a ceremony held at the Provincial Capitol. "Education is the greatest equalizer. Through this program, we are giving every young Kapampangan the chance to achieve their dreams," she stated.\n\nThe program prioritizes students from low-income families pursuing courses in engineering, medicine, education, agriculture, and information technology - fields aligned with the province''s economic development plans.\n\nSince its inception, the program has produced over 25,000 graduates with a 95% employment rate.',
 3, CURRENT_TIMESTAMP - INTERVAL '2 days', TRUE);

-- Link sample tags to posts
INSERT INTO news_post_tags (post_id, tag_id) VALUES
(1, 1), -- Healthcare
(1, 6), -- COVID-19
(2, 2), -- Education
(2, 4); -- Scholarship