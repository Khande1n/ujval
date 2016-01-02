<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
   Last login: Fri Jan  1 19:10:42 on ttys003
Nikhils-MacBook-Air:Nov4 Nikhil$ php artisan migrate:reset
Rolled back: 2015_12_30_010142_create_marketingimages_table
Rolled back: 2015_12_17_042309_create_attendances_table
Rolled back: 2015_12_17_041241_create_students_table
Rolled back: 2015_12_17_041034_create_staff_table
Rolled back: 2015_12_17_040352_create_marks_table
Rolled back: 2015_12_17_040340_create_exams_table
Rolled back: 2015_12_17_040328_create_subjects_table
Rolled back: 2015_12_17_040314_create_grades_table
Rolled back: 2015_12_17_040249_create_schools_table
Rolled back: 2015_12_15_133826_create_jobs_table
Rolled back: 2014_10_12_100000_create_password_resets_table
Nikhils-MacBook-Air:Nov4 Nikhil$ php artisan migrate
Migrated: 2014_10_12_100000_create_password_resets_table
Migrated: 2015_12_15_133826_create_jobs_table
Migrated: 2015_12_17_040249_create_schools_table
Migrated: 2015_12_17_040314_create_grades_table
Migrated: 2015_12_17_040328_create_subjects_table
Migrated: 2015_12_17_040340_create_exams_table
Migrated: 2015_12_17_040352_create_marks_table
Migrated: 2015_12_17_041034_create_staff_table
Migrated: 2015_12_17_041241_create_students_table
Migrated: 2015_12_17_042309_create_attendances_table
Migrated: 2015_12_30_010142_create_marketingimages_table
Nikhils-MacBook-Air:Nov4 Nikhil$ php artisan migrate:reset
Rolled back: 2015_12_30_010142_create_marketingimages_table
Rolled back: 2015_12_17_042309_create_attendances_table
Rolled back: 2015_12_17_041241_create_students_table
Rolled back: 2015_12_17_041034_create_staff_table
Rolled back: 2015_12_17_040352_create_marks_table
Rolled back: 2015_12_17_040340_create_exams_table
Rolled back: 2015_12_17_040328_create_subjects_table
Rolled back: 2015_12_17_040314_create_grades_table
Rolled back: 2015_12_17_040249_create_schools_table
Rolled back: 2015_12_15_133826_create_jobs_table
Rolled back: 2014_10_12_100000_create_password_resets_table
Nikhils-MacBook-Air:Nov4 Nikhil$ php artisan make:migration create_users_table
Created Migration: 2016_01_02_014211_create_users_table
Nikhils-MacBook-Air:Nov4 Nikhil$ php artisan migrate
Migrated: 2014_10_12_100000_create_password_resets_table
Migrated: 2015_12_15_133826_create_jobs_table
Migrated: 2015_12_17_040249_create_schools_table
Migrated: 2015_12_17_040314_create_grades_table
Migrated: 2015_12_17_040328_create_subjects_table
Migrated: 2015_12_17_040340_create_exams_table
Migrated: 2015_12_17_040352_create_marks_table
Migrated: 2015_12_17_041034_create_staff_table
Migrated: 2015_12_17_041241_create_students_table
Migrated: 2015_12_17_042309_create_attendances_table
Migrated: 2015_12_30_010142_create_marketingimages_table
Migrated: 2016_01_02_014211_create_users_table
Nikhils-MacBook-Air:Nov4 Nikhil$ php artisan migrate:reset
Rolled back: 2016_01_02_014211_create_users_table
Rolled back: 2015_12_30_010142_create_marketingimages_table
Rolled back: 2015_12_17_042309_create_attendances_table
Rolled back: 2015_12_17_041241_create_students_table
Rolled back: 2015_12_17_041034_create_staff_table
Rolled back: 2015_12_17_040352_create_marks_table
Rolled back: 2015_12_17_040340_create_exams_table
Rolled back: 2015_12_17_040328_create_subjects_table
Rolled back: 2015_12_17_040314_create_grades_table
Rolled back: 2015_12_17_040249_create_schools_table
Rolled back: 2015_12_15_133826_create_jobs_table
Rolled back: 2014_10_12_100000_create_password_resets_table
Nikhils-MacBook-Air:Nov4 Nikhil$ php artisan migrate
Migrated: 2014_10_12_100000_create_password_resets_table
Migrated: 2015_12_15_133826_create_jobs_table
Migrated: 2015_12_17_040249_create_schools_table
Migrated: 2015_12_17_040314_create_grades_table
Migrated: 2015_12_17_040328_create_subjects_table
Migrated: 2015_12_17_040340_create_exams_table
Migrated: 2015_12_17_040352_create_marks_table
Migrated: 2015_12_17_041034_create_staff_table
Migrated: 2015_12_17_041241_create_students_table
Migrated: 2015_12_17_042309_create_attendances_table
Migrated: 2015_12_30_010142_create_marketingimages_table
Migrated: 2016_01_02_014211_create_users_table
Nikhils-MacBook-Air:Nov4 Nikhil$ php artisan db:seed --class=UserTableSeeder


                                        
  [ReflectionException]                 
  Class UserTableSeeder does not exist  
                                        


Nikhils-MacBook-Air:Nov4 Nikhil$ php artisan db:seed --class=UsersTableSeeder


                                                            
  [InvalidArgumentException]                                
  Unable to locate factory with name [default] [App\User].  
                                                            


Nikhils-MacBook-Air:Nov4 Nikhil$ php artisan db:seed --class=UsersTableSeeder
Nikhils-MacBook-Air:Nov4 Nikhil$ clear

Nikhils-MacBook-Air:Nov4 Nikhil$ php artisan migrate:reset
Rolled back: 2016_01_02_014211_create_users_table
Rolled back: 2015_12_30_010142_create_marketingimages_table
Rolled back: 2015_12_17_042309_create_attendances_table
Rolled back: 2015_12_17_041241_create_students_table
Rolled back: 2015_12_17_041034_create_staff_table
Rolled back: 2015_12_17_040352_create_marks_table
Rolled back: 2015_12_17_040340_create_exams_table
Rolled back: 2015_12_17_040328_create_subjects_table
Rolled back: 2015_12_17_040314_create_grades_table
Rolled back: 2015_12_17_040249_create_schools_table
Rolled back: 2015_12_15_133826_create_jobs_table
Rolled back: 2014_10_12_100000_create_password_resets_table
Nikhils-MacBook-Air:Nov4 Nikhil$ php artisan migrate
Migrated: 2014_10_12_100000_create_password_resets_table
Migrated: 2015_12_15_133826_create_jobs_table
Migrated: 2015_12_17_040249_create_schools_table
Migrated: 2015_12_17_040314_create_grades_table
Migrated: 2015_12_17_040328_create_subjects_table
Migrated: 2015_12_17_040340_create_exams_table
Migrated: 2015_12_17_040352_create_marks_table
Migrated: 2015_12_17_041034_create_staff_table
Migrated: 2015_12_17_041241_create_students_table
Migrated: 2015_12_17_042309_create_attendances_table
Migrated: 2015_12_30_010142_create_marketingimages_table
Migrated: 2016_01_02_014211_create_users_table
Nikhils-MacBook-Air:Nov4 Nikhil$ php artisan db:seed --class=UsersTableSeeder
Nikhils-MacBook-Air:Nov4 Nikhil$ eb deploy
WARNING: You have uncommitted changes.
2016-01-02 05:43:39,401 (ERROR) ebcli.lib.aws : Botocore Error
ERROR: EndpointConnectionError :: Could not connect to the endpoint URL: "https://elasticbeanstalk.us-west-2.amazonaws.com/"
Nikhils-MacBook-Air:Nov4 Nikhil$ eb deploy
WARNING: You have uncommitted changes.
Creating application version archive "app-7ef1-160102_054425".
2016-01-02 05:44:48,866 (ERROR) ebcli.lib.aws : Botocore Error
ERROR: EndpointConnectionError :: Could not connect to the endpoint URL: "https://elasticbeanstalk-us-west-2-147562132295.s3.amazonaws.com/?prefix=Nov4%2Fapp-7ef1-160102_054425.zip&encoding-type=url"
Nikhils-MacBook-Air:Nov4 Nikhil$ ls -a
.				composer.lock
..				config
.DS_Store			database
.elasticbeanstalk		get-pip.py
.env				gulpfile.js
.git				mysql
.gitattributes			package.json
.gitignore			phpspec.yml
.metadata			phpunit.xml
00environmentVariables.config	public
01composer.config		readme.md
02artisan.config		resources
Archive.zip			server.php
app				storage
artisan				tests
bootstrap			vendor
composer.json
Nikhils-MacBook-Air:Nov4 Nikhil$ cd .elasticbeanstalk/
Nikhils-MacBook-Air:.elasticbeanstalk Nikhil$ ls -a
.		..		app_versions	config.yml
Nikhils-MacBook-Air:.elasticbeanstalk Nikhil$ cat config.yml 
branch-defaults:
  default:
    environment: nov4-env
  master:
    environment: nov4-env
global:
  application_name: Nov4
  default_ec2_keyname: ujval
  default_platform: PHP 5.4
  default_region: us-west-2
  profile: eb-cli
  sc: git
Nikhils-MacBook-Air:.elasticbeanstalk Nikhil$ cd ..
Nikhils-MacBook-Air:Nov4 Nikhil$ ls -a
.				composer.lock
..				config
.DS_Store			database
.elasticbeanstalk		get-pip.py
.env				gulpfile.js
.git				mysql
.gitattributes			package.json
.gitignore			phpspec.yml
.metadata			phpunit.xml
00environmentVariables.config	public
01composer.config		readme.md
02artisan.config		resources
Archive.zip			server.php
app				storage
artisan				tests
bootstrap			vendor
composer.json
Nikhils-MacBook-Air:Nov4 Nikhil$ cat 00environmentVariables.config 
option_settings:
   - namespace: aws:elasticbeanstalk:application:environment
     option_name: DB_HOST
     value: mysqldbname.dragegavysop.us-east-2.rds.amazonaws.com
   - option_name: DB_PORT
     value: 3306
   - option_name: DB_NAME
     value: dbname
   - option_name: DB_USER
     value: username
   - option_name: DB_PASS
     value: password
Nikhils-MacBook-Air:Nov4 Nikhil$ nano 00environmentVariables.config 
Nikhils-MacBook-Air:Nov4 Nikhil$ nano 01composer.config 
Nikhils-MacBook-Air:Nov4 Nikhil$ nano 02artisan.config 
Nikhils-MacBook-Air:Nov4 Nikhil$ eb deploy
WARNING: You have uncommitted changes.
Creating application version archive "app-7ef1-160102_133733".
Uploading: [##################################################] 100% Done...
INFO: Environment update is starting.                               
INFO: Deploying new version to instance(s).                         
INFO: New application version was deployed to running EC2 instances.
INFO: Environment update completed successfully.                    
                                                                      
Nikhils-MacBook-Air:Nov4 Nikhil$ git comit
git: 'comit' is not a git command. See 'git --help'.

Did you mean this?
	commit
Nikhils-MacBook-Air:Nov4 Nikhil$ git commit
On branch master
Changes not staged for commit:
	modified:   .DS_Store
	modified:   .metadata/.log
	modified:   .metadata/.plugins/org.eclipse.e4.workbench/workbench.xmi
	modified:   00environmentVariables.config
	modified:   app/Attendance.php
	modified:   app/Http/Controllers/ApiController.php
	modified:   app/Http/Controllers/Auth/AuthController.php
	modified:   app/Http/Controllers/DashboardController.php
	modified:   app/Http/Controllers/StaffEmailController.php
	modified:   app/Http/Controllers/TeacherController.php
	modified:   app/Http/Controllers/UserController.php
	modified:   app/Http/Requests/CreateStaffRequest.php
	modified:   app/School.php
	modified:   app/Staff.php
	modified:   app/User.php
	modified:   config/auth.php
	modified:   config/database.php
	modified:   database/factories/ModelFactory.php
	modified:   database/seeds/DatabaseSeeder.php
	modified:   database/seeds/UsersTableSeeder.php
	modified:   public/.DS_Store
	modified:   resources/views/auth/login.blade.php
	modified:   resources/views/auth/register.blade.php
	modified:   resources/views/create/createstaff.blade.php
	modified:   resources/views/layouts/website.blade.php
	modified:   resources/views/welcome.blade.php
	modified:   tests/CreateStaffTest.php

Untracked files:
	.metadata/.plugins/com.aptana.usage/events/1725069043.json
	.metadata/.plugins/com.aptana.usage/events/266808456.json
	.metadata/.plugins/com.aptana.usage/events/919765954.json
	01composer.config
	02artisan.config
	Archive.zip
	database/migrations/2016_01_02_014211_create_users_table.php
	mysql

no changes added to commit
Nikhils-MacBook-Air:Nov4 Nikhil$ git status
On branch master
Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git checkout -- <file>..." to discard changes in working directory)

	modified:   .DS_Store
	modified:   .metadata/.log
	modified:   .metadata/.plugins/org.eclipse.e4.workbench/workbench.xmi
	modified:   00environmentVariables.config
	modified:   app/Attendance.php
	modified:   app/Http/Controllers/ApiController.php
	modified:   app/Http/Controllers/Auth/AuthController.php
	modified:   app/Http/Controllers/DashboardController.php
	modified:   app/Http/Controllers/StaffEmailController.php
	modified:   app/Http/Controllers/TeacherController.php
	modified:   app/Http/Controllers/UserController.php
	modified:   app/Http/Requests/CreateStaffRequest.php
	modified:   app/School.php
	modified:   app/Staff.php
	modified:   app/User.php
	modified:   config/auth.php
	modified:   config/database.php
	modified:   database/factories/ModelFactory.php
	modified:   database/seeds/DatabaseSeeder.php
	modified:   database/seeds/UsersTableSeeder.php
	modified:   public/.DS_Store
	modified:   resources/views/auth/login.blade.php
	modified:   resources/views/auth/register.blade.php
	modified:   resources/views/create/createstaff.blade.php
	modified:   resources/views/layouts/website.blade.php
	modified:   resources/views/welcome.blade.php
	modified:   tests/CreateStaffTest.php

Untracked files:
  (use "git add <file>..." to include in what will be committed)

	.metadata/.plugins/com.aptana.usage/events/1725069043.json
	.metadata/.plugins/com.aptana.usage/events/266808456.json
	.metadata/.plugins/com.aptana.usage/events/919765954.json
	01composer.config
	02artisan.config
	Archive.zip
	database/migrations/2016_01_02_014211_create_users_table.php
	mysql

no changes added to commit (use "git add" and/or "git commit -a")
Nikhils-MacBook-Air:Nov4 Nikhil$ git add
Nothing specified, nothing added.
Maybe you wanted to say 'git add .'?
Nikhils-MacBook-Air:Nov4 Nikhil$ git add .
Nikhils-MacBook-Air:Nov4 Nikhil$ git commit

[1]+  Stopped                 git commit
Nikhils-MacBook-Air:Nov4 Nikhil$ git remote add origin
usage: git remote add [<options>] <name> <url>

    -f, --fetch           fetch the remote branches
    --tags                import all tags and associated objects when fetching
                          or do not fetch any tag at all (--no-tags)
    -t, --track <branch>  branch(es) to track
    -m, --master <branch>
                          master branch
    --mirror[=<push|fetch>]
                          set up remote as a mirror to push to or fetch from

Nikhils-MacBook-Air:Nov4 Nikhil$ git remote add -m origin https://github.com/Khande1n/ujval
usage: git remote add [<options>] <name> <url>

    -f, --fetch           fetch the remote branches
    --tags                import all tags and associated objects when fetching
                          or do not fetch any tag at all (--no-tags)
    -t, --track <branch>  branch(es) to track
    -m, --master <branch>
                          master branch
    --mirror[=<push|fetch>]
                          set up remote as a mirror to push to or fetch from

Nikhils-MacBook-Air:Nov4 Nikhil$ git remote add origin https://github.com/Khande1n/ujval
fatal: remote origin already exists.
Nikhils-MacBook-Air:Nov4 Nikhil$ git push
warning: push.default is unset; its implicit value has changed in
Git 2.0 from 'matching' to 'simple'. To squelch this message
and maintain the traditional behavior, use:

  git config --global push.default matching

To squelch this message and adopt the new behavior now, use:

  git config --global push.default simple

When push.default is set to 'matching', git will push local branches
to the remote branches that already exist with the same name.

Since Git 2.0, Git defaults to the more conservative 'simple'
behavior, which only pushes the current branch to the corresponding
remote branch that 'git pull' uses to update the current branch.

See 'git help config' and search for 'push.default' for further information.
(the 'simple' mode was introduced in Git 1.7.11. Use the similar mode
'current' instead of 'simple' if you sometimes use older versions of Git)

fatal: The current branch master has no upstream branch.
To push the current branch and set the remote as upstream, use

    git push --set-upstream origin master

Nikhils-MacBook-Air:Nov4 Nikhil$ git push origin master
Everything up-to-date
Nikhils-MacBook-Air:Nov4 Nikhil$ git add -A .
Nikhils-MacBook-Air:Nov4 Nikhil$ git status
On branch master
Changes to be committed:
  (use "git reset HEAD <file>..." to unstage)

	modified:   .DS_Store
	modified:   .metadata/.log
	new file:   .metadata/.plugins/com.aptana.usage/events/1725069043.json
	new file:   .metadata/.plugins/com.aptana.usage/events/266808456.json
	new file:   .metadata/.plugins/com.aptana.usage/events/919765954.json
	modified:   .metadata/.plugins/org.eclipse.e4.workbench/workbench.xmi
	modified:   00environmentVariables.config
	new file:   01composer.config
	new file:   02artisan.config
	new file:   Archive.zip
	modified:   app/Attendance.php
	modified:   app/Http/Controllers/ApiController.php
	modified:   app/Http/Controllers/Auth/AuthController.php
	modified:   app/Http/Controllers/DashboardController.php
	modified:   app/Http/Controllers/StaffEmailController.php
	modified:   app/Http/Controllers/TeacherController.php
	modified:   app/Http/Controllers/UserController.php
	modified:   app/Http/Requests/CreateStaffRequest.php
	modified:   app/School.php
	modified:   app/Staff.php
	modified:   app/User.php
	modified:   config/auth.php
	modified:   config/database.php
	modified:   database/factories/ModelFactory.php
	new file:   database/migrations/2016_01_02_014211_create_users_table.php
	modified:   database/seeds/DatabaseSeeder.php
	modified:   database/seeds/UsersTableSeeder.php
	new file:   mysql
	modified:   public/.DS_Store
	modified:   resources/views/auth/login.blade.php
	modified:   resources/views/auth/register.blade.php
	modified:   resources/views/create/createstaff.blade.php
	modified:   resources/views/layouts/website.blade.php
	modified:   resources/views/welcome.blade.php
	modified:   tests/CreateStaffTest.php

Nikhils-MacBook-Air:Nov4 Nikhil$ git reset --soft HEAD^ 
fatal: ambiguous argument 'HEAD^': unknown revision or path not in the working tree.
Use '--' to separate paths from revisions, like this:
'git <command> [<revision>...] -- [<file>...]'
Nikhils-MacBook-Air:Nov4 Nikhil$ git status
On branch master
Changes to be committed:
  (use "git reset HEAD <file>..." to unstage)

	modified:   .DS_Store
	modified:   .metadata/.log
	new file:   .metadata/.plugins/com.aptana.usage/events/1725069043.json
	new file:   .metadata/.plugins/com.aptana.usage/events/266808456.json
	new file:   .metadata/.plugins/com.aptana.usage/events/919765954.json
	modified:   .metadata/.plugins/org.eclipse.e4.workbench/workbench.xmi
	modified:   00environmentVariables.config
	new file:   01composer.config
	new file:   02artisan.config
	new file:   Archive.zip
	modified:   app/Attendance.php
	modified:   app/Http/Controllers/ApiController.php
	modified:   app/Http/Controllers/Auth/AuthController.php
	modified:   app/Http/Controllers/DashboardController.php
	modified:   app/Http/Controllers/StaffEmailController.php
	modified:   app/Http/Controllers/TeacherController.php
	modified:   app/Http/Controllers/UserController.php
	modified:   app/Http/Requests/CreateStaffRequest.php
	modified:   app/School.php
	modified:   app/Staff.php
	modified:   app/User.php
	modified:   config/auth.php
	modified:   config/database.php
	modified:   database/factories/ModelFactory.php
	new file:   database/migrations/2016_01_02_014211_create_users_table.php
	modified:   database/seeds/DatabaseSeeder.php
	modified:   database/seeds/UsersTableSeeder.php
	new file:   mysql
	modified:   public/.DS_Store
	modified:   resources/views/auth/login.blade.php
	modified:   resources/views/auth/register.blade.php
	modified:   resources/views/create/createstaff.blade.php
	modified:   resources/views/layouts/website.blade.php
	modified:   resources/views/welcome.blade.php
	modified:   tests/CreateStaffTest.php

Changes not staged for commit:
  (use "git add/rm <file>..." to update what will be committed)
  (use "git checkout -- <file>..." to discard changes in working directory)

	modified:   .metadata/.plugins/org.eclipse.e4.workbench/workbench.xmi
	deleted:    Archive.zip

Nikhils-MacBook-Air:Nov4 Nikhil$ git add -A .
Nikhils-MacBook-Air:Nov4 Nikhil$ git status
On branch master
Changes to be committed:
  (use "git reset HEAD <file>..." to unstage)

	modified:   .DS_Store
	modified:   .metadata/.log
	new file:   .metadata/.plugins/com.aptana.usage/events/1725069043.json
	new file:   .metadata/.plugins/com.aptana.usage/events/266808456.json
	new file:   .metadata/.plugins/com.aptana.usage/events/919765954.json
	modified:   .metadata/.plugins/org.eclipse.e4.workbench/workbench.xmi
	modified:   00environmentVariables.config
	new file:   01composer.config
	new file:   02artisan.config
	modified:   app/Attendance.php
	modified:   app/Http/Controllers/ApiController.php
	modified:   app/Http/Controllers/Auth/AuthController.php
	modified:   app/Http/Controllers/DashboardController.php
	modified:   app/Http/Controllers/StaffEmailController.php
	modified:   app/Http/Controllers/TeacherController.php
	modified:   app/Http/Controllers/UserController.php
	modified:   app/Http/Requests/CreateStaffRequest.php
	modified:   app/School.php
	modified:   app/Staff.php
	modified:   app/User.php
	modified:   config/auth.php
	modified:   config/database.php
	modified:   database/factories/ModelFactory.php
	new file:   database/migrations/2016_01_02_014211_create_users_table.php
	modified:   database/seeds/DatabaseSeeder.php
	modified:   database/seeds/UsersTableSeeder.php
	new file:   mysql
	modified:   public/.DS_Store
	modified:   resources/views/auth/login.blade.php
	modified:   resources/views/auth/register.blade.php
	modified:   resources/views/create/createstaff.blade.php
	modified:   resources/views/layouts/website.blade.php
	modified:   resources/views/welcome.blade.php
	modified:   tests/CreateStaffTest.php

Nikhils-MacBook-Air:Nov4 Nikhil$ git remote add origin https://github.com/Khande1n/ujval.git
fatal: remote origin already exists.
Nikhils-MacBook-Air:Nov4 Nikhil$ git remote -v
origin	https://github.com/Khande1n/ujval.git (fetch)
origin	https://github.com/Khande1n/ujval.git (push)
Nikhils-MacBook-Air:Nov4 Nikhil$ git push
warning: push.default is unset; its implicit value has changed in
Git 2.0 from 'matching' to 'simple'. To squelch this message
and maintain the traditional behavior, use:

  git config --global push.default matching

To squelch this message and adopt the new behavior now, use:

  git config --global push.default simple

When push.default is set to 'matching', git will push local branches
to the remote branches that already exist with the same name.

Since Git 2.0, Git defaults to the more conservative 'simple'
behavior, which only pushes the current branch to the corresponding
remote branch that 'git pull' uses to update the current branch.

See 'git help config' and search for 'push.default' for further information.
(the 'simple' mode was introduced in Git 1.7.11. Use the similar mode
'current' instead of 'simple' if you sometimes use older versions of Git)

fatal: The current branch master has no upstream branch.
To push the current branch and set the remote as upstream, use

    git push --set-upstream origin master

Nikhils-MacBook-Air:Nov4 Nikhil$ git https://github.com/Khande1n/ujval.git push
git: 'https://github.com/Khande1n/ujval.git' is not a git command. See 'git --help'.
Nikhils-MacBook-Air:Nov4 Nikhil$ git push origin master
Everything up-to-date
Nikhils-MacBook-Air:Nov4 Nikhil$ git commit -m "Second"
[master f737ccb] Second
 Committer: Nikhil <Nikhil@Nikhils-MacBook-Air.local>
Your name and email address were configured automatically based
on your username and hostname. Please check that they are accurate.
You can suppress this message by setting them explicitly. Run the
following command and follow the instructions in your editor to edit
your configuration file:

    git config --global --edit

After doing this, you may fix the identity used for this commit with:

    git commit --amend --reset-author

 34 files changed, 2878 insertions(+), 1366 deletions(-)
 create mode 100644 .metadata/.plugins/com.aptana.usage/events/1725069043.json
 create mode 100644 .metadata/.plugins/com.aptana.usage/events/266808456.json
 create mode 100644 .metadata/.plugins/com.aptana.usage/events/919765954.json
 create mode 100644 01composer.config
 create mode 100644 02artisan.config
 create mode 100644 database/migrations/2016_01_02_014211_create_users_table.php
 create mode 100644 mysql
Nikhils-MacBook-Air:Nov4 Nikhil$ git push origin master
Counting objects: 57, done.
Delta compression using up to 4 threads.
Compressing objects: 100% (54/54), done.
Writing objects: 100% (57/57), 23.05 KiB | 0 bytes/s, done.
Total 57 (delta 42), reused 0 (delta 0)
To https://github.com/Khande1n/ujval.git
   7ef13b5..f737ccb  master -> master
Nikhils-MacBook-Air:Nov4 Nikhil$ eb deploy
WARNING: You have uncommitted changes.
Creating application version archive "app-f737-160102_143048".
Uploading: [##################################################] 100% Done...
INFO: Environment update is starting.                               
INFO: Deploying new version to instance(s).                         
INFO: New application version was deployed to running EC2 instances.
INFO: Environment update completed successfully.                    
                                                                      
Nikhils-MacBook-Air:Nov4 Nikhil$ ls -a
.				composer.lock
..				config
.DS_Store			database
.elasticbeanstalk		get-pip.py
.env				gulpfile.js
.git				mysql
.gitattributes			package.json
.gitignore			phpspec.yml
.metadata			phpunit.xml
00environmentVariables.config	public
01composer.config		readme.md
02artisan.config		resources
app				server.php
artisan				storage
bootstrap			tests
composer.json			vendor
Nikhils-MacBook-Air:Nov4 Nikhil$ cat .env 
APP_ENV=local
APP_DEBUG=true
APP_KEY=SSRYfn4j2vmvH6329zH4TA7m9plYnPEh

DB_HOST=localhost
DB_DATABASE=User
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
Nikhils-MacBook-Air:Nov4 Nikhil$ nano .env 
Nikhils-MacBook-Air:Nov4 Nikhil$ git status
On branch master
Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git checkout -- <file>..." to discard changes in working directory)

	modified:   .metadata/.plugins/org.eclipse.e4.workbench/workbench.xmi
	modified:   config/database.php

no changes added to commit (use "git add" and/or "git commit -a")
Nikhils-MacBook-Air:Nov4 Nikhil$ git add -A .
Nikhils-MacBook-Air:Nov4 Nikhil$ git status
On branch master
Changes to be committed:
  (use "git reset HEAD <file>..." to unstage)

	modified:   .metadata/.plugins/org.eclipse.e4.workbench/workbench.xmi
	modified:   config/database.php

Nikhils-MacBook-Air:Nov4 Nikhil$ git commit -m "Third"
[master a9d9409] Third
 Committer: Nikhil <Nikhil@Nikhils-MacBook-Air.local>
Your name and email address were configured automatically based
on your username and hostname. Please check that they are accurate.
You can suppress this message by setting them explicitly. Run the
following command and follow the instructions in your editor to edit
your configuration file:

    git config --global --edit

After doing this, you may fix the identity used for this commit with:

    git commit --amend --reset-author

 2 files changed, 1332 insertions(+), 1292 deletions(-)
Nikhils-MacBook-Air:Nov4 Nikhil$ git push origin master
Counting objects: 8, done.
Delta compression using up to 4 threads.
Compressing objects: 100% (7/7), done.
Writing objects: 100% (8/8), 14.71 KiB | 0 bytes/s, done.
Total 8 (delta 6), reused 0 (delta 0)
To https://github.com/Khande1n/ujval.git
   f737ccb..a9d9409  master -> master
Nikhils-MacBook-Air:Nov4 Nikhil$ eb deploy
WARNING: You have uncommitted changes.
Creating application version archive "app-a9d9-160102_145658".
Uploading: [##################################################] 100% Done...
INFO: Environment update is starting.                               
INFO: Deploying new version to instance(s).                         
INFO: New application version was deployed to running EC2 instances.
INFO: Environment update completed successfully.                    
                                                                      
Nikhils-MacBook-Air:Nov4 Nikhil$ nano .env 

  GNU nano 2.0.6                File: .env                                      

APP_ENV=production
APP_DEBUG=true
APP_KEY=SSRYfn4j2vmvH6329zH4TA7m9plYnPEh

DB_HOST=ujvaldb.cdof00xdxqt6.us-west-2.rds.amazonaws.com
DB_DATABASE=ujvaldb
DB_USERNAME=dbusername
DB_PASSWORD=dbpassword
DB_PORT=3306

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null

^G Get Help  ^O WriteOut  ^R Read File ^Y Prev Page ^K Cut Text  ^C Cur Pos
^X Exit      ^J Justify   ^W Where Is  ^V Next Page ^U UnCut Text^T To Spell
   
   
   
   
   
   
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
