<div id="content">
    <div class="post">
        <h2 class="title"><a name="#whatisgit">What is Git?</a></h2>
        <div style="clear: both;">&nbsp;</div>
        <div class="entry">
            <p>
                Git is a <strong>distributed</strong> (you don't have latest copy, but whole source) version control system, originally written by Linus Torvalds for Linux Kernel development.
                It is Free and Open Source software. You can get it for Linux, Mac and Windows (either native or cygwin). 
                There are also plugins for Eclipse, etc, so you don’t have to work from a terminal like me.
            </p>
        </div>
    </div>

    <div class="post">
        <h2 class="title"><a name="#setupandinit">Setup and Init</a></h2>
        <div style="clear: both;">&nbsp;</div>
        <div class="entry">
            <p>
                To start working with Git, you need to provide some info about yourself. E.g. username and email. Those info can be stored on global, system and local level.
                Global one is for all projects (repos), system is per system and local is per selected project.
            </p>
            <div class="dp-highlighter">
                <div class="bar">
                    <div class="tools">this is per project (--local)</div>
                </div>
                <ol start="1" clas="dp-c">
                    <li class="alt">git config --local user.name "Dusan Novakovic"</li>
                    <li>git config --local user.email "ndusan@gmail.com"</li>
                    <li class="alt">git config --local color.diff auto</li>
                    <li>git config --local color.status auto</li>
                    <li class="alt">git config --local color.branch auto</li>
                    <li>git config</li>
                </ol>
            </div>
            <p>If you set per project (--local), those info will be stored in <strong>project_dir/.git/config</strong>. In case of global (--global), data will be stored in your system root dir <strong>~/.gitconfig</strong>.</p>
            <p>So, if you define config per project, inside of it settings will be applied from local config even if you have set config on global level. But if you don't set local config per project, global one will be applied.</p>
            <p>After setting config, you just have to create folder where your project will be in and then run command <strong>git init</strong> and everything is set.</p>
            <div class="dp-highlighter">
                <div class="bar">
                    <div class="tools">init git inside of your project</div>
                </div>
                <ol start="1" clas="dp-c">
                    <li class="alt">mkdir my_project</li>
                    <li>cd my_project</li>
                    <li class="alt">git init</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="post">
        <h2 class="title"><a name="#thebasics">The Basics</a></h2>
        <div style="clear: both;">&nbsp;</div>
        <div class="entry">
            <p>The main command that will help you a lot is <strong>git status</strong>. By typing that command you'll get all needed info about your brunch and file status.</p>
            <p>So let's start adding files into our project. First, after creating file type <strong>git status</strong> and you'll get info that there is new untracked file <i>README</i>.
            <p>We have to put file in staging by typing command <strong>git add file_name</strong>. After that we have to commit our file with command <strong>git commit file_name -m "add your comment"</strong>.
            To show whole process, after creating file type <strong>git status</strong> to get info about file.</p>
            <p>Important thing to undestand is that all commits are <strong>local</strong>!</p>
            <div class="dp-highlighter">
                <div class="bar">
                    <div class="tools">add and commit file</div>
                </div>
                <ol start="1" clas="dp-c">
                    <li class="alt">touch README</li>
                    <li>git status</li>
                    <li class="alt">git add README</li>
                    <li>git status</li>
                    <li class="alt">git commit README -m "Commit file by name README"</li>
                </ol>
            </div>
            <p>Main difference in marking files between SVN, CVS and Git is that in SVN every commit is getting number incremented by one from previous one (of course firs commit will have number 1), CVS is setting each file a version number (1.1; 1.2; etc.) and
            Git is setting SHA1 hash on commit. Why SHA1? Because we can guaranty content of repo (promise that what we put in is what we get out)!</p>
            <p>All changes are possible to trach by typing command <strong>git log</strong>.
            <div class="dp-highlighter">
                <div class="bar">
                    <div class="tools">log of all commited files</div>
                </div>
                <ol start="1" clas="dp-c">
                    <li class="alt">git log</li>
                </ol>
            </div>
            <p>Interesting thing and one of the biggest difference compare to SVN is that if we change content of <i>README</i> file and running command <strong>git commit README -m "commit again"</strong> this file won't be commited
            because in Git you have to first add changed file to staging area by typing <strong>git add README</strong>. In SVN if you run commit this file will be pushed directly. This is really important because sometime you don't want to commit
            file directly after making change on it.</p>
            <p>Also interesting thing to mention is if you add file to staging area by typing <strong>git add README</strong>, but then decide to remove file from staging area because we would like to make more changes just type <strong>git reset</strong>
            and file will be removed from staging area.</p>
            <div class="dp-highlighter">
                <div class="bar">
                    <div class="tools">edit file and add it again to staging area</div>
                </div>
                <ol start="1" clas="dp-c">
                    <li class="alt">echo some text > README</li>
                    <li>git status</li>
                    <li class="alt">git add README</li>
                    <li>git status</li>
                    <li class="alt">git reset</li>
                    <li>git status</li>
                    <li class="alt">git add README</li>
                    <li>git status</li>
                    <li class="alt">git commit README -m "second commit of README file"</li>
                    <li>git status</li>
                </ol>
            </div>
            <p>There are two ways of reseting things. The first one is <strong>git reset</strong> and that one will remove files from staging area. The second one is <strong>git reset --hard</strong> and that one will return your file into previous shape before change (e.g.
            in file README we added text <i>some text</i>, if we run <strong>git reset --hard</strong> we will clear local change on README file.</p>
            
        </div>
    </div>

    <div class="post">
        <h2 class="title"><a name="#pushingandpulling">Pushing and Pulling</a></h2>
        <div style="clear: both;">&nbsp;</div>
        <div class="entry">
            <p>In this part I'm going to explain the process of pushing local copy to remote repository (in this case we are going to set repo to be USB flash). Let's say that we have USB where we would like to store data, we have to create repo on it by using command <strong>git init --bare</strong>.
            This will create the same structure as the one we have inside our file <strong>.git</strong> in root of our project. </p>
            <p>Next thing that we have to do is to say to Git where to look for remote repo by using command <strong>git remote add name_of_repo path_to_folder_on_USB</strong>. After that it's just enough to say <strong>git push name_of_repo master</strong> and that's it. </p>
            <div class="dp-highlighter">
                <div class="bar">
                    <div class="tools">push to USB flash</div>
                </div>
                <ol start="1" clas="dp-c">
                    <li class="alt">cd /my_custom_path/usb</li>
                    <li>mkdir backup</li>
                    <li class="alt">cd backup</li>
                    <li>git init --bare</li>
                    <li class="alt">ls -la</li>
                    <li>cd /my_custom_path/my_project</li>
                    <li class="alt">git remote add name_of_repo path_to_folder_on_USB</li>
                    <li>git push name_of_repo master</li>
                    <li class="alt">git status</li>
                </ol>
            </div>
            <p>Let's look at the example how to create remote repository on server. To do that we need to have access to server and for that we should have <i>webdev</i> or <i>git://</i> or <i>ssh</i> (this one is most secure).</p>
            <p>So after connecting to server via e.g. <i>ssh</i> we have to create folder where repo will be set (also we need to set <strong>--shared</strong> to escape permission problem) and after that process of adding remote repo is the same.</p>
            <div class="dp-highlighter">
                <div class="bar">
                    <div class="tools">push to server</div>
                </div>
                <ol start="1" clas="dp-c">
                    <li class="alt">ssh user@myserver</li>
                    <li>mkdir backup</li>
                    <li class="alt">cd backup</li>
                    <li>git init --bare --share</li>
                    <li class="alt">ls -la</li>
                    <li>cd /my_custom_path/my_project</li>
                    <li class="alt">git remote add origin user@myserver:/my_custom_path/backup</li>
                    <li>git push origin master</li>
                    <li class="alt">git status</li>
                </ol>
            </div>
            <p>Pulling changes can be done through two commands <strong>git fetch name_of_repo</strong> (this one will fetch data from remote repo) and <strong>git rebase name_of_repo/name_of_branch</strong> (this one will apply changes on our local repo.</p>
            <div class="dp-highlighter">
                <div class="bar">
                    <div class="tools">pull from server</div>
                </div>
                <ol start="1" clas="dp-c">
                    <li class="alt">git fetch name_of_repo</li>
                    <li>git rebase name_of_repo/name_of_branch</li>
                    <li class="alt">git status</li>
                </ol>
            </div>
            <p>The other, faster, way to do this is just by using command <strong>git pull name_of_repo name_of_branch</strong>.</p>
            <div class="dp-highlighter">
                <div class="bar">
                    <div class="tools">pull from server by using pull command</div>
                </div>
                <ol start="1" clas="dp-c">
                    <li class="alt">git pull name_of_repo name_of_branch</li>
                </ol>
            </div>
        </div>

    </div>

    <div style="clear: both;">&nbsp;</div>
</div>

<?php require_once 'sidebar.php'; ?>