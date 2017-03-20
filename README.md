WP Custom REST API
=================

This plugin is a faster alternative to WP REST API(since it gets a lot less data than WP REST).

Posts
=================
* Get All Posts:
   * YOUR_SITE.DOMAIN/wp-json/givekesh/posts
* Get a Specific Post(via Post ID):
   * YOUR_SITE.DOMAIN/wp-json/givekesh/posts/POST_ID
* Get a Specific Post(via Post: URL):
   * YOUR_SITE.DOMAIN/wp-json/givekesh/posts/POST_URL

### Schema

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

### Arguments

|Argument|Description|Default|
|---|---|---|
|category_name|Show Posts Associated with a Specific Category|Null|
|search|Search for Posts with a Keyword|Null|
|per_page|How many Posts will be in each Page|10|
|page|Which Page to Show|1|


Comments
=================
* Get All Comments Associated with a Specific Post(via Post ID):
  * YOUR_SITE.DOMAIN/wp-json/givekesh/comments/POST_ID

### Schema
    {
      id: COMMENT_ID,
      parent: PARENT_ID,
      date: COMMENT_DATE,
      content: COMMENT_CONTENT,
      author_info: {
        display_name: AUTHOR_DISPLAY_NAME,
        avatar_url: AUTHOR_AVATAR_URL
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
