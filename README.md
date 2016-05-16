WP REST API - Author Info Plugin
=================

This plugin is a faster alternative to WP REST API(since it gets a lot less data than WP REST).



    {
    	id: POST_ID,
    	date: POST_DATE,
    	title: {
    		rendered: POST_TITLE
    	},
    	content: {
    		rendered: POST_CONTENT
    	},
    	excerpt: {
    		rendered: POST_EXCERPT
    	},
    	author_info: {
    		id: AUTHOR_ID,
    		display_name: AUTHOR_DISPLAY_NAME
    		avatar_url: AUTHOR_AVATAR_URL
    	},
    	image: {
    		source_url: POST_IMAGE_URL
    	}
    },

License
=======

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
    
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
    along with this program.  If not, see http://www.gnu.org/licenses
