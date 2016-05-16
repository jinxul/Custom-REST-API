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

```license
Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
```