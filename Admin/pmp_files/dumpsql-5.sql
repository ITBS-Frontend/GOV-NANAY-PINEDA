
CREATE TABLE pampanga_about (
    id SERIAL PRIMARY KEY,
    preview_text TEXT,
    main_image VARCHAR(255),
    showcase_image_1 VARCHAR(255),
    showcase_image_2 VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE quick_facts (
    id SERIAL PRIMARY KEY,
    icon VARCHAR(100),
    title VARCHAR(100),
    description TEXT,
    display_order INT,
    is_active BOOLEAN DEFAULT true
);