# DEVLOG

## 13/05/2026 - Wednesday
Repos are setup (commit for each feature implemented) \
Created Trello Board with over 50 tasks. \
Laravel and React have been installed.

## 14/05/2026 - Thursday
Created API endpoint for Admin Login \
Created Model, Migration, Controller and Factory for Project \
Created Auth Tokens so that the user can login access endpoints which require auth (e.g. projects) \
Added versioning, so I can cleanly add new features without getting lost. \
Added a Project Resource so I can control what is displayed in the response. \
Added a User Resource for the same reason above
added an ApiController which has a function to check whether a filter is included in the URL

### Files:
AuthController.php \
ProjectController.php \
UsersController.php \
ApiController.php
Project.php \
ApiResponses.php \
ApiLoginRequest.php \
LoginUserRequest.php \
UserResources.php \
ProjectResources.php \
ProjectFactory.php \
2026_05_14_094437_create_projects_table.php \
web.php \
api.php \
api_v1.php 


### Tomorrow:

Work on Projects CRUD functionality

## 15/05/2026 - Friday