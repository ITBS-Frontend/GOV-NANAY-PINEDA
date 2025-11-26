-- ===========================================
-- PROVINCE INFORMATION SCHEMA
-- ===========================================

-- Province History & Heritage
CREATE TABLE province_history (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    period VARCHAR(100), -- e.g., "Spanish Era", "American Period"
    content TEXT NOT NULL,
    timeline_year INTEGER,
    featured_image VARCHAR(500),
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Demographics Data
CREATE TABLE demographics_data (
    id SERIAL PRIMARY KEY,
    data_type VARCHAR(100) NOT NULL, -- 'population', 'age_distribution', 'literacy_rate'
    label VARCHAR(255) NOT NULL,
    value VARCHAR(100) NOT NULL,
    year INTEGER NOT NULL,
    source VARCHAR(255),
    display_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Geographic Information
CREATE TABLE geographic_info (
    id SERIAL PRIMARY KEY,
    info_type VARCHAR(100) NOT NULL, -- 'municipality', 'landmark', 'boundary'
    name VARCHAR(255) NOT NULL,
    description TEXT,
    coordinates VARCHAR(100), -- latitude, longitude
    area_sqkm DECIMAL(10,2),
    population INTEGER,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================================
-- GOVERNMENT FACILITIES & SERVICES
-- ===========================================

-- Service Categories
CREATE TABLE service_categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    icon_class VARCHAR(100),
    color_code VARCHAR(7) DEFAULT '#3B82F6',
    display_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Government Facilities
CREATE TABLE government_facilities (
    id SERIAL PRIMARY KEY,
    facility_type VARCHAR(100) NOT NULL, -- 'hospital', 'school', 'office', 'barangay_hall'
    name VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    municipality VARCHAR(100),
    contact_number VARCHAR(50),
    email VARCHAR(255),
    operating_hours VARCHAR(255),
    services_offered TEXT,
    coordinates VARCHAR(100),
    featured_image VARCHAR(500),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Public Services
CREATE TABLE public_services (
    id SERIAL PRIMARY KEY,
    category_id INTEGER REFERENCES service_categories(id),
    service_name VARCHAR(255) NOT NULL,
    description TEXT,
    requirements TEXT,
    process_steps TEXT,
    processing_time VARCHAR(100),
    fees VARCHAR(255),
    contact_info TEXT,
    online_link VARCHAR(500),
    display_order INTEGER DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================================
-- TOURISM SCHEMA
-- ===========================================

-- Tourism Categories
CREATE TABLE tourism_categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL, -- 'Historical', 'Natural', 'Cultural', 'Adventure'
    icon_class VARCHAR(100),
    color_code VARCHAR(7) DEFAULT '#3B82F6',
    display_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tourism Destinations
CREATE TABLE tourism_destinations (
    id SERIAL PRIMARY KEY,
    category_id INTEGER REFERENCES tourism_categories(id),
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    full_description TEXT,
    municipality VARCHAR(100) NOT NULL,
    address TEXT,
    coordinates VARCHAR(100),
    entry_fee VARCHAR(100),
    operating_hours VARCHAR(255),
    best_time_to_visit VARCHAR(255),
    how_to_get_there TEXT,
    featured_image VARCHAR(500),
    is_featured BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tourism Facilities (Hotels, Restaurants, etc.)
CREATE TABLE tourism_facilities (
    id SERIAL PRIMARY KEY,
    facility_type VARCHAR(100) NOT NULL, -- 'hotel', 'restaurant', 'transport', 'tour_operator'
    ownership VARCHAR(50) NOT NULL, -- 'government', 'private'
    name VARCHAR(255) NOT NULL,
    description TEXT,
    municipality VARCHAR(100),
    address TEXT,
    contact_number VARCHAR(50),
    email VARCHAR(255),
    website VARCHAR(255),
    price_range VARCHAR(100), -- e.g., "₱₱₱"
    amenities TEXT,
    coordinates VARCHAR(100),
    featured_image VARCHAR(500),
    rating DECIMAL(2,1) DEFAULT 0,
    is_verified BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Destination Gallery
CREATE TABLE destination_gallery (
    id SERIAL PRIMARY KEY,
    destination_id INTEGER REFERENCES tourism_destinations(id) ON DELETE CASCADE,
    image_path VARCHAR(500) NOT NULL,
    caption VARCHAR(255),
    display_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tourism Activities
CREATE TABLE tourism_activities (
    id SERIAL PRIMARY KEY,
    destination_id INTEGER REFERENCES tourism_destinations(id),
    activity_name VARCHAR(255) NOT NULL,
    description TEXT,
    duration VARCHAR(100),
    difficulty_level VARCHAR(50), -- 'Easy', 'Moderate', 'Challenging'
    display_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================================
-- SOCIAL SERVICES & PROGRAMS
-- ===========================================

-- Program Categories
CREATE TABLE program_categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL, -- 'Health', 'Education', 'Social Welfare', 'Livelihood'
    icon_class VARCHAR(100),
    color_code VARCHAR(7) DEFAULT '#3B82F6',
    display_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Health Programs
CREATE TABLE health_programs (
    id SERIAL PRIMARY KEY,
    program_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    objectives TEXT,
    target_beneficiaries VARCHAR(255),
    coverage_area VARCHAR(255),
    implementation_date DATE,
    status VARCHAR(50) DEFAULT 'Active', -- 'Active', 'Completed', 'Planned'
    contact_info TEXT,
    featured_image VARCHAR(500),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Social Welfare Programs
CREATE TABLE social_welfare_programs (
    id SERIAL PRIMARY KEY,
    category_id INTEGER REFERENCES program_categories(id),
    program_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    eligibility_criteria TEXT,
    benefits TEXT,
    how_to_apply TEXT,
    required_documents TEXT,
    contact_info TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Program Beneficiaries Statistics
CREATE TABLE program_statistics (
    id SERIAL PRIMARY KEY,
    program_id INTEGER,
    program_type VARCHAR(50), -- 'health', 'social_welfare', 'education'
    stat_label VARCHAR(100) NOT NULL,
    stat_value VARCHAR(50) NOT NULL,
    year INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================================
-- ECONOMIC & INFRASTRUCTURE
-- ===========================================

-- Expand existing projects table
ALTER TABLE projects 
ADD COLUMN project_type VARCHAR(100) DEFAULT 'governance', -- 'governance', 'infrastructure', 'economic', 'environmental'
ADD COLUMN municipality VARCHAR(100),
ADD COLUMN coordinates VARCHAR(100),
ADD COLUMN economic_impact TEXT;

-- Economic Indicators
CREATE TABLE economic_indicators (
    id SERIAL PRIMARY KEY,
    indicator_name VARCHAR(255) NOT NULL,
    value VARCHAR(100) NOT NULL,
    unit VARCHAR(50),
    year INTEGER NOT NULL,
    quarter VARCHAR(10),
    source VARCHAR(255),
    display_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Business Sectors
CREATE TABLE business_sectors (
    id SERIAL PRIMARY KEY,
    sector_name VARCHAR(255) NOT NULL,
    description TEXT,
    number_of_establishments INTEGER,
    employment_generated INTEGER,
    contribution_to_gdp DECIMAL(5,2),
    icon_class VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Investment Opportunities
CREATE TABLE investment_opportunities (
    id SERIAL PRIMARY KEY,
    opportunity_title VARCHAR(255) NOT NULL,
    sector VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255),
    estimated_investment VARCHAR(100),
    potential_returns TEXT,
    incentives TEXT,
    contact_info TEXT,
    featured_image VARCHAR(500),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================================
-- ENVIRONMENT & DISASTER MANAGEMENT
-- ===========================================

-- Environmental Programs
CREATE TABLE environmental_programs (
    id SERIAL PRIMARY KEY,
    program_name VARCHAR(255) NOT NULL,
    program_type VARCHAR(100), -- 'conservation', 'pollution_control', 'waste_management'
    description TEXT NOT NULL,
    objectives TEXT,
    coverage_area VARCHAR(255),
    implementation_date DATE,
    status VARCHAR(50) DEFAULT 'Active',
    featured_image VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Disaster Preparedness
CREATE TABLE disaster_preparedness (
    id SERIAL PRIMARY KEY,
    disaster_type VARCHAR(100) NOT NULL, -- 'flood', 'typhoon', 'earthquake'
    preparedness_guide TEXT NOT NULL,
    emergency_hotlines TEXT,
    evacuation_centers TEXT,
    relief_procedures TEXT,
    featured_image VARCHAR(500),
    display_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Disaster Incidents (Historical record)
CREATE TABLE disaster_incidents (
    id SERIAL PRIMARY KEY,
    incident_type VARCHAR(100) NOT NULL,
    incident_name VARCHAR(255),
    occurrence_date DATE NOT NULL,
    affected_areas TEXT,
    casualties INTEGER DEFAULT 0,
    damages_estimated DECIMAL(15,2),
    response_actions TEXT,
    lessons_learned TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Emergency Facilities
CREATE TABLE emergency_facilities (
    id SERIAL PRIMARY KEY,
    facility_type VARCHAR(100) NOT NULL, -- 'evacuation_center', 'fire_station', 'police_station'
    name VARCHAR(255) NOT NULL,
    municipality VARCHAR(100),
    address TEXT,
    capacity INTEGER,
    contact_number VARCHAR(50),
    coordinates VARCHAR(100),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================================
-- MODIFY EXISTING TABLES
-- ===========================================

-- Expand categories for broader classification
ALTER TABLE categories 
ADD COLUMN category_type VARCHAR(50) DEFAULT 'project', -- 'project', 'news', 'tourism', 'service'
ADD COLUMN parent_id INTEGER REFERENCES categories(id);

-- Update news for diverse content
ALTER TABLE news_posts
ADD COLUMN news_type VARCHAR(50) DEFAULT 'general'; -- 'provincial_update', 'tourism', 'health', 'disaster'

-- Add municipalities reference table
CREATE TABLE municipalities (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    population INTEGER,
    area_sqkm DECIMAL(10,2),
    coordinates VARCHAR(100),
    mayor_name VARCHAR(255),
    contact_number VARCHAR(50),
    email VARCHAR(255),
    display_order INTEGER DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ===========================================
-- SAMPLE DATA FOR ALL NEW TABLES
-- ===========================================

-- ===========================================
-- MUNICIPALITIES (Base Reference Data)
-- ===========================================
INSERT INTO municipalities (name, population, area_sqkm, coordinates, mayor_name, contact_number, email, display_order) VALUES
('Angeles City', 462928, 60.27, '15.1450,120.5887', 'Carmelo "Pogi" Lazatin Jr.', '(045) 322-2838', 'mayor@angeles.gov.ph', 1),
('San Fernando', 354666, 67.74, '15.0285,120.6897', 'Vilma Caluag', '(045) 961-2505', 'mayor@sanfernando.gov.ph', 2),
('Mabalacat', 293006, 83.18, '15.2230,120.5710', 'Crisostomo Garbo', '(045) 331-3284', 'mayor@mabalacat.gov.ph', 3),
('Porac', 140751, 314.00, '15.0732,120.5403', 'Jaime Capil', '(045) 458-0479', 'mayor@porac.gov.ph', 4),
('Guagua', 128893, 45.00, '14.9647,120.6363', 'Dante Torres', '(045) 900-0123', 'mayor@guagua.gov.ph', 5),
('Lubao', 173502, 155.77, '14.9392,120.5959', 'Mylyn Pineda-Cayabyab', '(045) 921-0234', 'mayor@lubao.gov.ph', 6),
('Apalit', 117160, 61.52, '14.9503,120.7572', 'Oscar Tetangco Jr.', '(045) 961-1077', 'mayor@apalit.gov.ph', 7),
('Mexico', 173403, 118.52, '15.0667,120.7200', 'Teddy Tumang', '(045) 963-5052', 'mayor@mexico.gov.ph', 8);

-- ===========================================
-- PROVINCE HISTORY & HERITAGE
-- ===========================================
INSERT INTO province_history (title, period, content, timeline_year, display_order, is_active) VALUES
('The Spanish Colonial Era', 'Spanish Period (1571-1898)', 
'Pampanga was one of the first provinces established by the Spanish colonial government in 1571. The name "Pampanga" comes from the river of the same name, which means "river bank" in the Kapampangan language. During this period, Pampanga became a center of Christianity and commerce in Central Luzon.', 
1571, 1, true),

('American Occupation', 'American Period (1898-1946)', 
'Under American rule, Pampanga saw significant modernization of infrastructure and education systems. The province played a crucial role during World War II, particularly during the Death March and the liberation campaigns. Clark Air Base was established during this period.', 
1898, 2, true),

('Post-War Development', 'Independence Era (1946-1990)', 
'After independence, Pampanga emerged as an industrial and economic hub. The province recovered from war devastation and developed its agricultural and manufacturing sectors. The presence of Clark Air Base brought economic prosperity to the region.', 
1946, 3, true),

('Mount Pinatubo Eruption', 'Modern Era (1991)', 
'The 1991 eruption of Mount Pinatubo was one of the most significant events in Pampanga''s recent history. Despite the devastation, the province demonstrated remarkable resilience, rebuilding communities and transforming lahar-affected areas into productive lands.', 
1991, 4, true),

('21st Century Progress', 'Contemporary Period (2000-Present)', 
'Modern Pampanga has evolved into a premier destination for business, tourism, and culture. The conversion of Clark Air Base into a special economic zone has attracted international investors. The province is now known for its culinary heritage, festivals, and progressive governance.', 
2000, 5, true);

-- ===========================================
-- DEMOGRAPHICS DATA
-- ===========================================
INSERT INTO demographics_data (data_type, label, value, year, source, display_order) VALUES
('population', 'Total Population', '2,609,744', 2020, 'Philippine Statistics Authority', 1),
('population', 'Population Growth Rate', '1.02%', 2020, 'Philippine Statistics Authority', 2),
('population', 'Population Density', '1,265/km²', 2020, 'Philippine Statistics Authority', 3),
('age_distribution', 'Age 0-14', '28.5%', 2020, 'PSA Census', 4),
('age_distribution', 'Age 15-64', '65.2%', 2020, 'PSA Census', 5),
('age_distribution', 'Age 65+', '6.3%', 2020, 'PSA Census', 6),
('literacy_rate', 'Overall Literacy Rate', '98.7%', 2020, 'Department of Education', 7),
('education', 'College Graduates', '23.4%', 2020, 'PSA Census', 8),
('language', 'Kapampangan Speakers', '85%', 2020, 'Provincial Language Survey', 9),
('language', 'English Proficiency', '92%', 2020, 'Provincial Language Survey', 10),
('employment', 'Employment Rate', '94.8%', 2023, 'Provincial Labor Office', 11),
('poverty', 'Poverty Incidence', '5.8%', 2021, 'PSA Poverty Statistics', 12);

-- ===========================================
-- GEOGRAPHIC INFORMATION
-- ===========================================
INSERT INTO geographic_info (info_type, name, description, coordinates, area_sqkm, population) VALUES
('landmark', 'Mount Arayat', 'An extinct stratovolcano and the most prominent geographic landmark in Pampanga, rising 1,026 meters above sea level.', '15.1986,120.7425', NULL, NULL),
('landmark', 'Pampanga River', 'The second largest river in Luzon, spanning 260 kilometers and crucial to the province''s irrigation and commerce.', '15.0500,120.7000', NULL, NULL),
('boundary', 'Northern Boundary', 'Borders Tarlac province', NULL, NULL, NULL),
('boundary', 'Eastern Boundary', 'Borders Nueva Ecija and Bulacan provinces', NULL, NULL, NULL),
('boundary', 'Southern Boundary', 'Borders Bataan province and Manila Bay', NULL, NULL, NULL),
('boundary', 'Western Boundary', 'Borders Zambales province', NULL, NULL, NULL),
('municipality', 'Total Land Area', 'Pampanga total land area', NULL, 2062.00, 2609744);

-- ===========================================
-- SERVICE CATEGORIES
-- ===========================================
INSERT INTO service_categories (name, icon_class, color_code, display_order) VALUES
('Business Permits', 'fas fa-briefcase', '#3B82F6', 1),
('Civil Registry', 'fas fa-file-alt', '#10B981', 2),
('Health Services', 'fas fa-heartbeat', '#EF4444', 3),
('Social Services', 'fas fa-hands-helping', '#F59E0B', 4),
('Agricultural Support', 'fas fa-seedling', '#059669', 5),
('Public Safety', 'fas fa-shield-alt', '#DC2626', 6),
('Education Services', 'fas fa-graduation-cap', '#8B5CF6', 7);

-- ===========================================
-- GOVERNMENT FACILITIES
-- ===========================================
INSERT INTO government_facilities (facility_type, name, address, municipality, contact_number, email, operating_hours, services_offered, coordinates, is_active) VALUES
('hospital', 'Jose B. Lingad Memorial Regional Hospital', 'San Fernando City', 'San Fernando', '(045) 961-2588', 'jblmrh@doh.gov.ph', 'Monday-Sunday, 24 Hours', 'Emergency Care, Surgery, Maternity, Laboratory, Radiology', '15.0350,120.6850', true),
('hospital', 'Angeles University Foundation Medical Center', 'MacArthur Highway, Angeles City', 'Angeles City', '(045) 888-8001', 'info@auf.edu.ph', 'Monday-Sunday, 24 Hours', 'Emergency, ICU, Surgery, Dialysis, Cancer Center', '15.1500,120.5900', true),
('school', 'Pampanga High School', 'San Fernando City', 'San Fernando', '(045) 963-2345', 'phs@deped.gov.ph', 'Monday-Friday, 7:00 AM - 5:00 PM', 'Secondary Education', '15.0300,120.6900', true),
('office', 'Provincial Capitol', 'San Fernando City', 'San Fernando', '(045) 961-2505', 'info@pampanga.gov.ph', 'Monday-Friday, 8:00 AM - 5:00 PM', 'Government Services, Business Permits, Civil Registry', '15.0285,120.6897', true),
('office', 'City Hall of Angeles', 'Sto. Rosario Street, Angeles City', 'Angeles City', '(045) 322-2838', 'info@angeles.gov.ph', 'Monday-Friday, 8:00 AM - 5:00 PM', 'Municipal Services, Business Permits, Tax Collection', '15.1450,120.5887', true),
('barangay_hall', 'Barangay Sto. Domingo Hall', 'Angeles City', 'Angeles City', '(045) 322-1234', 'brgy.stodomingo@angeles.gov.ph', 'Monday-Friday, 8:00 AM - 5:00 PM', 'Barangay Clearance, Certificates, Community Services', '15.1400,120.5850', true);

-- ===========================================
-- PUBLIC SERVICES
-- ===========================================
INSERT INTO public_services (category_id, service_name, description, requirements, process_steps, processing_time, fees, contact_info, display_order, is_active) VALUES
(1, 'Business Permit Application', 'Application for new business permits and renewals', 'Valid ID, DTI Registration, Barangay Clearance, Fire Safety Inspection Certificate', '1. Submit requirements at Business Permits Office
2. Pay required fees
3. Wait for inspection
4. Claim business permit', '5-7 working days', 'Varies based on business type', 'Provincial Business Permits Office: (045) 961-2505', 1, true),

(2, 'Birth Certificate Request', 'Obtain certified true copies of birth certificates', 'Valid ID of requestor, Authorization letter (if representative)', '1. Fill out request form
2. Present valid ID
3. Pay processing fee
4. Wait for processing
5. Claim certificate', 'Same day to 3 working days', '₱150 per copy', 'Civil Registry Office: (045) 961-2600', 1, true),

(3, 'PhilHealth Registration', 'Register for PhilHealth membership and benefits', 'Valid ID, Birth Certificate, Proof of Income', '1. Visit Provincial Health Office
2. Fill out PhilHealth forms
3. Submit requirements
4. Receive PhilHealth ID', '15-30 days', 'Free', 'Provincial Health Office: (045) 961-2588', 1, true),

(4, 'Senior Citizen ID Application', 'Apply for senior citizen identification card', 'Birth Certificate, 2 valid IDs, 2x2 photo', '1. Visit Office of Senior Citizens Affairs
2. Fill out application form
3. Submit requirements
4. Have photo taken
5. Claim ID card', '3-5 working days', 'Free', 'OSCA: (045) 961-2650', 1, true);

-- ===========================================
-- TOURISM CATEGORIES
-- ===========================================
INSERT INTO tourism_categories (name, icon_class, color_code, display_order) VALUES
('Historical Sites', 'fas fa-landmark', '#8B5CF6', 1),
('Natural Attractions', 'fas fa-tree', '#10B981', 2),
('Religious Sites', 'fas fa-church', '#3B82F6', 3),
('Cultural Heritage', 'fas fa-palette', '#F59E0B', 4),
('Adventure & Recreation', 'fas fa-hiking', '#EF4444', 5),
('Food & Culinary', 'fas fa-utensils', '#EC4899', 6);

-- ===========================================
-- TOURISM DESTINATIONS
-- ===========================================
INSERT INTO tourism_destinations (category_id, name, description, full_description, municipality, address, coordinates, entry_fee, operating_hours, best_time_to_visit, how_to_get_there, is_featured, is_active) VALUES
(1, 'Nayong Pilipino Clark', 'A cultural theme park showcasing Filipino heritage and traditions', 'Nayong Pilipino Clark is a 40-hectare cultural and historical theme park located inside Clark Freeport Zone. It features replicas of famous Philippine landmarks, traditional houses, and exhibits showcasing the rich cultural diversity of the Philippines. Visitors can explore miniature versions of iconic structures and learn about Filipino history, arts, and crafts.', 'Angeles City', 'Clark Freeport Zone, Angeles City', '15.1850,120.5600', 'Adults: ₱150, Children: ₱100', '8:00 AM - 5:00 PM', 'October to May (Dry Season)', 'From Manila: Take NLEX to Clark Exit. From Angeles City proper: Take jeepney or tricycle to Clark Gate 2.', true, true),

(2, 'Mount Arayat National Park', 'A dormant volcano offering hiking trails and panoramic views', 'Mount Arayat stands at 1,026 meters and is one of Pampanga''s most iconic natural landmarks. The mountain offers several hiking trails with varying difficulty levels. At the summit, hikers are rewarded with breathtaking 360-degree views of Central Luzon. The park is also home to diverse flora and fauna, natural springs, and caves.', 'Arayat', 'Brgy. Ayala, Arayat, Pampanga', '15.1986,120.7425', '₱50 registration fee', '6:00 AM - 3:00 PM (last entry)', 'October to March (Cooler months)', 'From San Fernando: Take bus to Arayat town, then tricycle to jump-off point. Coordinate with local guides at the base.', true, true),

(3, 'San Guillermo Parish Church (Bacolor)', 'Historic church half-buried by lahar from Mt. Pinatubo eruption', 'The San Guillermo Parish Church in Bacolor is a powerful testament to resilience. Half of the church remains buried under lahar from the 1991 Mt. Pinatubo eruption, creating a unique and haunting sight. Visitors can enter through the second floor, which is now at ground level. The church has been restored and continues to serve the community while standing as a reminder of nature''s power.', 'Bacolor', 'Town Center, Bacolor, Pampanga', '15.0000,120.6500', 'Free (donations welcome)', '8:00 AM - 5:00 PM', 'Year-round', 'From San Fernando: Take jeepney to Bacolor town center. Church is visible from the main road.', true, true),

(4, 'Aquino Center and Museum', 'Museum dedicated to the Aquino family and Philippine democracy', 'The Aquino Center and Museum houses memorabilia and exhibits about the life and legacy of former Senator Benigno "Ninoy" Aquino Jr. and former President Corazon "Cory" Aquino. The museum features personal belongings, photographs, and historical documents that tell the story of their fight for democracy and freedom.', 'Tarlac', 'Hacienda Luisita, Tarlac (near Pampanga border)', '15.5200,120.6800', '₱50', 'Tuesday-Sunday, 9:00 AM - 4:00 PM', 'Year-round', 'From Angeles or San Fernando: Take bus to Tarlac, then tricycle to Hacienda Luisita.', false, true),

(6, 'Sisig Capital - Angeles City', 'Culinary destination famous for the invention of sizzling sisig', 'Angeles City is recognized as the birthplace of sisig, one of the Philippines'' most beloved dishes. The city''s food scene offers authentic sisig restaurants where visitors can taste various preparations of this iconic dish made from pig''s head and liver, seasoned with calamansi and chili peppers. Food tours are available.', 'Angeles City', 'Various locations in Angeles City', '15.1450,120.5887', 'Varies per restaurant', 'Most restaurants: 11:00 AM - 10:00 PM', 'Year-round', 'Walking distance in downtown Angeles City. Most famous sisig spots are in the Friendship Highway area.', true, true);

-- ===========================================
-- TOURISM FACILITIES
-- ===========================================
INSERT INTO tourism_facilities (facility_type, ownership, name, description, municipality, address, contact_number, email, website, price_range, amenities, rating, is_verified, is_active) VALUES
('hotel', 'private', 'Widus Hotel and Casino', 'Five-star hotel and integrated resort in Clark Freeport', 'Angeles City', 'Clark Freeport Zone', '(045) 499-1000', 'reservations@widushotel.com', 'www.widushotel.com', '₱₱₱₱', 'Casino, Swimming Pool, Spa, Restaurants, Convention Center', 4.5, true, true),

('hotel', 'private', 'Park Inn by Radisson Clark', 'Modern business hotel in Clark', 'Angeles City', 'Clark Freeport Zone', '(045) 599-7888', 'info.clark@parkinn.com', 'www.parkinn.com/clark', '₱₱₱', 'Pool, Gym, Restaurant, Meeting Rooms, Free WiFi', 4.3, true, true),

('restaurant', 'private', 'Aling Lucing Sisig', 'Original and most famous sisig restaurant', 'Angeles City', 'Valdez St., Angeles City', '(045) 888-1234', NULL, NULL, '₱', 'Outdoor Seating, Famous Sisig', 4.8, true, true),

('restaurant', 'private', 'Everybody''s Cafe', 'Famous for tocino and traditional Kapampangan dishes', 'San Fernando', 'San Nicolas, San Fernando', '(045) 963-2745', 'info@everybodyscafe.ph', 'www.everybodyscafe.ph', '₱₱', 'Air-conditioned, Parking, Takeout', 4.6, true, true),

('transport', 'government', 'Provincial Tourism Office Van Rental', 'Government-operated tourist van service', 'San Fernando', 'Provincial Capitol, San Fernando', '(045) 961-2888', 'tourism@pampanga.gov.ph', NULL, '₱₱', 'Air-conditioned vans, Licensed drivers, Tour guide available', 4.0, true, true),

('tour_operator', 'private', 'Pampanga Tours and Travel', 'Full-service tour operator for Pampanga destinations', 'Angeles City', 'Nepo Mall, Angeles City', '(045) 888-5678', 'info@pampangatours.com', 'www.pampangatours.com', '₱₱', 'Customized tours, Airport transfers, Hotel booking', 4.4, true, true);

-- ===========================================
-- DESTINATION GALLERY
-- ===========================================
INSERT INTO destination_gallery (destination_id, image_path, caption, display_order) VALUES
(1, 'nayong-pilipino-1.jpg', 'Main entrance of Nayong Pilipino Clark', 1),
(1, 'nayong-pilipino-2.jpg', 'Traditional Filipino houses replica', 2),
(2, 'mt-arayat-summit.jpg', 'Panoramic view from Mount Arayat summit', 1),
(2, 'mt-arayat-trail.jpg', 'Hiking trail through the forest', 2),
(3, 'bacolor-church-exterior.jpg', 'San Guillermo Church half-buried in lahar', 1);

-- ===========================================
-- TOURISM ACTIVITIES
-- ===========================================
INSERT INTO tourism_activities (destination_id, activity_name, description, duration, difficulty_level, display_order) VALUES
(2, 'Summit Hike', 'Trek to the peak of Mount Arayat for panoramic views', '4-6 hours', 'Moderate', 1),
(2, 'Nature Photography', 'Capture diverse flora and fauna along the trails', '2-3 hours', 'Easy', 2),
(2, 'Bird Watching', 'Observe native bird species in their natural habitat', '2-4 hours', 'Easy', 3),
(1, 'Cultural Tour', 'Guided tour of Filipino heritage exhibits', '2-3 hours', 'Easy', 1),
(1, 'Traditional Crafts Workshop', 'Learn traditional Filipino handicrafts', '1-2 hours', 'Easy', 2);

-- ===========================================
-- PROGRAM CATEGORIES
-- ===========================================
INSERT INTO program_categories (name, icon_class, color_code, display_order) VALUES
('Health', 'fas fa-heartbeat', '#EF4444', 1),
('Education', 'fas fa-graduation-cap', '#3B82F6', 2),
('Social Welfare', 'fas fa-hands-helping', '#10B981', 3),
('Livelihood', 'fas fa-briefcase', '#F59E0B', 4),
('Senior Citizens', 'fas fa-user-friends', '#8B5CF6', 5);

-- ===========================================
-- HEALTH PROGRAMS
-- ===========================================
INSERT INTO health_programs (program_name, description, objectives, target_beneficiaries, coverage_area, implementation_date, status, contact_info, is_active) VALUES
('Universal Health Care Program', 'Free hospitalization and medical services for all Kapampangans', 'To provide accessible and affordable healthcare services to all residents of Pampanga, eliminating financial barriers to medical treatment', 'All residents of Pampanga', 'Province-wide', '2019-01-01', 'Active', 'Provincial Health Office: (045) 961-2588', true),

('Libreng Gamot Para sa Lahat', 'Free medicine program for indigent patients', 'To provide free essential medicines to qualified patients, particularly those with chronic diseases', 'Indigent patients, senior citizens, persons with disabilities', 'All provincial hospitals and RHUs', '2018-06-15', 'Active', 'Provincial Health Office: (045) 961-2588', true),

('Mobile Dialysis Program', 'Mobile dialysis services for kidney patients in remote areas', 'To bring dialysis treatment closer to patients in far-flung municipalities', 'Kidney disease patients', 'Remote municipalities', '2020-03-01', 'Active', 'Provincial Hospital: (045) 961-2588 ext. 250', true),

('Mental Health Awareness Campaign', 'Mental health education and counseling services', 'To promote mental health awareness and provide accessible counseling services', 'All residents, particularly youth and adults', 'Province-wide', '2021-10-10', 'Active', 'Provincial Mental Health Unit: (045) 961-2700', true);

-- ===========================================
-- SOCIAL WELFARE PROGRAMS
-- ===========================================
INSERT INTO social_welfare_programs (category_id, program_name, description, eligibility_criteria, benefits, how_to_apply, required_documents, contact_info, is_active) VALUES
(3, 'Pantawid Pamilyang Pilipino Program (4Ps)', 'Conditional cash transfer program for poorest families', 'Household income below poverty threshold, with children 0-18 years old or pregnant women', 'Monthly cash grants: ₱750 per household for health, ₱300-500 per child for education', 'Visit Municipal Social Welfare Office for assessment and registration', 'Birth certificates of children, Marriage certificate, Proof of residence, Valid IDs', 'DSWD Pampanga: (045) 961-2888', true),

(5, 'Senior Citizens Assistance Program', 'Financial and medical assistance for senior citizens', 'Filipino citizen, 60 years old and above, resident of Pampanga', 'Medical assistance, burial assistance, monthly pension for indigent seniors', 'Register at Office of Senior Citizens Affairs', 'Birth Certificate, Valid IDs, Barangay Certification', 'OSCA: (045) 961-2650', true),

(3, 'Assistensya sa Pagpapaaral (ASAP)', 'Educational assistance for underprivileged students', 'Students from low-income families, good academic standing', 'School supplies, tuition assistance, transportation allowance', 'Apply through school guidance counselor', 'Report card, Certificate of Indigency, Parents'' ID', 'Provincial Social Welfare Office: (045) 961-2750', true);

-- ===========================================
-- PROGRAM STATISTICS
-- ===========================================
INSERT INTO program_statistics (program_id, program_type, stat_label, stat_value, year) VALUES
(1, 'health', 'Patients Served', '150,000', 2023),
(1, 'health', 'Hospitals Covered', '15', 2023),
(1, 'health', 'Annual Budget', '₱2.5B', 2023),
(2, 'health', 'Medicines Distributed', '500,000', 2023),
(2, 'health', 'Beneficiaries', '75,000', 2023);

-- ===========================================
-- ECONOMIC INDICATORS
-- ===========================================
INSERT INTO economic_indicators (indicator_name, value, unit, year, quarter, source, display_order) VALUES
('Gross Regional Domestic Product (GRDP)', '653.4', 'Billion Pesos', 2022, NULL, 'Philippine Statistics Authority', 1),
('GRDP Growth Rate', '7.2', 'Percent', 2022, NULL, 'Philippine Statistics Authority', 2),
('Per Capita GRDP', '250,327', 'Pesos', 2022, NULL, 'Philippine Statistics Authority', 3),
('Unemployment Rate', '4.5', 'Percent', 2023, 'Q2', 'Provincial Labor Office', 4),
('Inflation Rate', '4.8', 'Percent', 2023, 'Q3', 'PSA Regional Office', 5),
('Total Exports', '45.2', 'Billion Pesos', 2022, NULL, 'Clark Development Corporation', 6);

-- ===========================================
-- BUSINESS SECTORS
-- ===========================================
INSERT INTO business_sectors (sector_name, description, number_of_establishments, employment_generated, contribution_to_gdp, icon_class) VALUES
('Manufacturing', 'Electronics, automotive parts, garments, food processing', 3500, 180000, 35.5, 'fas fa-industry'),
('Services', 'BPO, tourism, retail, hospitality, education', 5200, 220000, 42.3, 'fas fa-concierge-bell'),
('Agriculture', 'Rice, sugarcane, vegetables, aquaculture', 8000, 95000, 8.2, 'fas fa-tractor'),
('Trade', 'Wholesale and retail trade, import-export', 12000, 150000, 14.0, 'fas fa-store');

-- ===========================================
-- INVESTMENT OPPORTUNITIES
-- ===========================================
INSERT INTO investment_opportunities (opportunity_title, sector, description, location, estimated_investment, potential_returns, incentives, contact_info, is_active) VALUES
('Clark Green City Development', 'Real Estate & Urban Development', 'Master-planned sustainable city development within Clark Freeport Zone covering 9,450 hectares', 'Clark Freeport Zone', '₱1 Trillion+', 'Expected annual returns of 15-20% based on property appreciation and rental yields', 'Tax incentives, streamlined permits, infrastructure support from government', 'Clark Development Corporation: (045) 599-3106', true),

('Solar Power Farm', 'Renewable Energy', 'Large-scale solar power generation facility to supply Clark and surrounding areas', 'Porac, Pampanga', '₱5-8 Billion', 'Guaranteed power purchase agreement for 20 years, projected IRR of 12-15%', 'Income tax holiday, duty-free importation of equipment, feed-in tariff', 'Department of Energy Regional Office: (045) 961-3200', true),

('Agri-Tourism Farm Resort', 'Tourism & Agriculture', 'Integrated farm resort showcasing modern agriculture and eco-tourism', 'Mexico or Magalang', '₱50-100 Million', 'Break-even in 3-5 years, annual returns of 18-25%', 'DTI support, low-interest loans, marketing assistance', 'Provincial Tourism Office: (045) 961-2888', true),

('Food Manufacturing Hub', 'Food Processing', 'Central processing facility for Kapampangan delicacies with modern packaging and distribution', 'San Fernando or Angeles City', '₱200-300 Million', 'ROI within 5-7 years, export potential to Asia-Pacific', 'PEZA incentives if registered, skills training support, market linkage', 'Provincial Investment Promotion Center: (045) 961-2900', true);

-- ===========================================
-- ENVIRONMENTAL PROGRAMS
-- ===========================================
INSERT INTO environmental_programs (program_name, program_type, description, objectives, coverage_area, implementation_date, status) VALUES
('Pampanga River Rehabilitation Project', 'conservation', 'Comprehensive river cleanup and ecosystem restoration program', 'To restore the health of Pampanga River, improve water quality, and protect aquatic biodiversity', 'Entire Pampanga River system', '2020-01-15', 'Active'),

('Lahar Reforestation Initiative', 'conservation', 'Massive tree-planting program in lahar-affected areas', 'To rehabilitate lahar wastelands through reforestation and create sustainable forest ecosystems', 'Mt. Pinatubo affected areas in Porac, Mabalacat, Bamban', '2019-06-01', 'Active'),

('Zero Waste Pampanga', 'waste_management', 'Province-wide waste segregation and recycling program', 'To achieve zero waste in all municipalities through proper waste management practices', 'All 19 municipalities', '2021-01-01', 'Active'),

('Clean Air Monitoring Program', 'pollution_control', 'Air quality monitoring and emission control', 'To maintain healthy air quality standards across the province', 'Major urban areas and industrial zones', '2018-03-01', 'Active');

-- ===========================================
-- DISASTER PREPAREDNESS
-- ===========================================
INSERT INTO disaster_preparedness (disaster_type, preparedness_guide, emergency_hotlines, evacuation_centers, relief_procedures, display_order) VALUES
('flood', 'Monitor weather updates. Prepare emergency kit with food, water, medicine, flashlight, and important documents. Know your nearest evacuation center. Have a family communication plan.', 'Provincial DRRM: (045) 961-3333
NDRRMC: 911
Red Cross Pampanga: (045) 961-1355', 'List of 150 designated evacuation centers in all municipalities. Major centers: Angeles City Sports Complex, San Fernando Gymnasium, Municipal Halls', 'Report to designated evacuation center. Register with barangay officials. Receive relief goods (food, water, hygiene kits). Follow health protocols. Do not return home until authorities declare it safe.', 1),

('typhoon', 'Secure loose objects outside. Stock food and water for 3 days. Charge all devices. Stay indoors during the typhoon. Monitor official weather advisories. Prepare flashlights and battery-powered radio.', 'PAGASA: (045) 961-4444
Provincial DRRM: (045) 961-3333
Emergency Hotline: 911', 'Same evacuation centers as flood preparedness. Pre-positioned rescue equipment and relief goods.', 'Pre-emptive evacuation when Signal #2 or higher. Distribution of hot meals and sleeping kits. Medical teams on standby. Post-typhoon damage assessment and rehabilitation.', 2),

('earthquake', 'Duck, Cover, and Hold On. Do not panic. Stay away from windows and heavy objects. After shaking stops, evacuate calmly using stairs. Check for injuries and hazards.', 'PHIVOLCS: (02) 8426-1468
Provincial DRRM: (045) 961-3333
Emergency Hotline: 911', 'Open spaces: Provincial Capitol grounds, City plazas, School grounds. Avoid entering buildings until inspected.', 'Move to designated assembly areas. Wait for structural inspection. Emergency medical services deployed. Temporary shelter for affected families.', 3),

('lahar', 'Residents near Mt. Pinatubo must monitor lahar warnings during heavy rains. Evacuate immediately when sirens sound. Do not cross flooded rivers or channels.', 'PHIVOLCS: (02) 8426-1468
Provincial DRRM: (045) 961-3333
Porac DRRM: (045) 458-0479', 'Elevated evacuation centers in Porac, Mabalacat, Floridablanca. Away from lahar channels.', 'Mandatory evacuation during heavy rainfall warnings. 24-hour monitoring of lahar channels. Rapid response teams positioned. Emergency food and shelter ready.', 4);

-- ===========================================
-- DISASTER INCIDENTS (Historical Records)
-- ===========================================
INSERT INTO disaster_incidents (incident_type, incident_name, occurrence_date, affected_areas, casualties, damages_estimated, response_actions, lessons_learned) VALUES
('volcanic_eruption', 'Mount Pinatubo Eruption', '1991-06-15', 'Entire Pampanga, particularly Porac, Mabalacat, Bamban, Angeles City', 847, 10000000000.00, 'Mass evacuation of 20,000 families, establishment of evacuation centers, international aid coordination, lahar mitigation infrastructure built', 'Importance of early warning systems, need for resilient infrastructure, value of community preparedness, long-term rehabilitation planning essential'),

('typhoon', 'Typhoon Pedring (Nesat)', '2011-09-27', 'San Fernando, Mexico, Apalit, Masantol, Macabebe', 18, 1500000000.00, 'Pre-emptive evacuation, deployment of rescue teams, relief distribution, temporary shelters', 'Improved flood control systems needed, evacuation centers must be better equipped'),

('earthquake', 'Lubao Earthquake', '2019-04-22', 'Lubao, Guagua, Sasmuan, Floridablanca', 0, 450000000.00, 'Building inspections, temporary relocation, structural repairs, counseling services', 'Building code compliance critical, old structures need retrofitting'),

('flood', 'Southwest Monsoon Flooding', '2012-08-06', 'Multiple municipalities', 5, 800000000.00, 'Rescue operations, relief distribution, temporary shelters, dredging of rivers', 'Regular river dredging necessary, early warning systems effective');

-- ===========================================
-- EMERGENCY FACILITIES
-- ===========================================
INSERT INTO emergency_facilities (facility_type, name, municipality, address, capacity, contact_number, coordinates, is_active) VALUES
('evacuation_center', 'Angeles City Sports Complex', 'Angeles City', 'Pandan, Angeles City', 5000, '(045) 322-3456', '15.1500,120.5900', true),
('evacuation_center', 'San Fernando Gymnasium', 'San Fernando', 'City Hall Compound, San Fernando', 3000, '(045) 961-2600', '15.0300,120.6900', true),
('fire_station', 'Angeles City Fire Station', 'Angeles City', 'Sto. Rosario St., Angeles City', NULL, '(045) 322-4567', '15.1450,120.5887', true),
('fire_station', 'San Fernando Fire Station', 'San Fernando', 'MacArthur Highway, San Fernando', NULL, '(045) 961-2700', '15.0320,120.6880', true),
('police_station', 'Angeles City Police Station', 'Angeles City', 'Miranda St., Angeles City', NULL, '(045) 322-5678', '15.1460,120.5890', true),
('police_station', 'Pampanga Provincial Police Office', 'San Fernando', 'Provincial Capitol, San Fernando', NULL, '(045) 961-3000', '15.0285,120.6897', true),
('evacuation_center', 'Porac Evacuation Center', 'Porac', 'Porac Municipal Hall', 2000, '(045) 458-0479', '15.0700,120.5400', true);