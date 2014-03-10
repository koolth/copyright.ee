#Copyright Plugin for ExpressionEngine
**License:** GPL v3.0
**Version:** 1.0 (10/03/2014)

This plugin allows you to easily display a copyright notice e.g., **© 2012 - 2014**

##Using the Copyright Plugin - Parameters
The 'copyright' tag, supports the following parameters:

* **start_year**: The start year of the copyright notice (default = [current year])
* **show_symbol**: Whether the © symbol is displayed or not (default = 'true')

##Using the Plugin - Examples

	{exp:copyright:display}

Displays: *© [current year]* (e.g.: **© 2014**) 

	{exp:copyright:display show_symbol='false'}

Toggle display of copyright symbol (©).

Valid values: 'false', 'no', 'n', '0', 'true', 'yes', 'y', '1'

	{exp:copyright:display start_year='2013'}

Set start year of copyright notice. Displays: **© 2013 - [current year]**

Valid values: > 1000

Note: If *'start_year'* is equal to or greater than the current year, then *'start_year'* is ignored.

##Installing The Plugin
1. Download the .zip file.
2. Extract the `system\expressionengine\third_party\copyright` directory to your EE `system\expressionengine\third_party\` directory.
3. Log into EE and navigate to '*Add-Ons->Plugins->Copyright*' to ensure plugin has installed correctly and to view usage instructions.

###Feedback
Please contact us via our website at http://koolth.com.au with any comments and/or suggestions.
