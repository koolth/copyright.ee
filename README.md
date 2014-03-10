#Copyright notice Plugin for ExpressionEngine
**License:** GPL v3.0
**Version:** 1.0 (10/03/2014)

This plugin allows you to easily display a copyright notice e.g., **© 2012 - 2014**

##Using the Copyright Plugin - Parameters
The plugin tag (*{exp:copyright:display}*), supports the following parameters:

* **start_year**: The start year of the copyright notice (default = [current year])
* **show_symbol**: Whether the © symbol is displayed or not (default = 'true')

##Using the Plugin - Examples

	{exp:copyright:display}

Displays: *© [current year]* (e.g.: **© 2014**) 

Toggle display of copyright symbol (©) 
Valid values: 'false', 'no', 'n', '0', 'true', 'yes', 'y', '1'

	{exp:copyright:display show_symbol='false'}

Set start year of copyright notice
Valid values: > 1000

	{exp:copyright:display start_year='2013'}

The above would display: **© 2013 - [current year]**
Note: If *'start_year'* is equal to or greater than the current year, then *'start_year'* is ignored.
