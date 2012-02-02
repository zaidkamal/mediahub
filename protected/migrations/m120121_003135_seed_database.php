<?php

class m120121_003135_seed_database extends CDbMigration {
	public function up() {
		$genres = array(
			'movies' => array('action', 'adventure', 'biography', 'crime', 'drama', 'fantasy', 'horror', 'musical', 'romance', 'short', 'theater', 'war', 'adult', 'animation', 'comedy', 'documentary', 'family', 'history', 'music', 'mystery', 'science_fiction', 'sport', 'thriller', 'western'),
			'television' => array('show', 'series', 'news', 'sports', 'culture', 'infotainment'),
			'corporate' => array('promotion', 'image', 'event', 'presentation', 'webinar', 'elearning'),
			'commercial' => array('spot', 'promotion', 'trailer', 'signage')
		);
		
		foreach ($genres as $primary => $secondaries) {
			$this->insert('genres', array('name' => $primary));
			
			foreach ($secondaries as $secondary) {
				$this->execute("INSERT INTO genres(name, parent_id) VALUES('$secondary', (SELECT id FROM genres WHERE name = '$primary'))");
			}
		}
	}
	
	public function down() {
		$this->truncateTable('{{genres}}');
	}
}
