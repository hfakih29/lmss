
<div class="span3" >
    <div class="sidebar" >
    <ul class="widget widget-menu unstyled">
    <li>
        <a href="{{ URL::route('home') }}">
            <i class="menu-icon icon-home"></i>Home
        </a>
    </li>
    <li class="active">
	    <a href="#studentsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">STUDENTS</a>
	    <ul class="collapse list-unstyled" id="studentsSubmenu">
            <li>
                <a href="{{ URL::route('students-for-approval') }}">
                    <i class="menu-icon icon-filter"></i> All Waiting Students
                </a>
            </li>
            <li>
                <a href="{{ URL::route('registered-students') }}">
                    <i class="menu-icon icon-group"></i>All approved Students
                </a>
            </li>
	            </ul>
	</li>
    <li class="active">
	    <a href="#booksSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">BOOKS</a>
	    <ul class="collapse list-unstyled" id="booksSubmenu">
            <li>
                <a href="{{ URL::route('all-books') }}">
                    <i class="menu-icon icon-th-list"></i>All Books in Library
                </a>
            </li>
            <li>
                <a href="{{ URL::route('add-book-category') }}">
                    <i class="menu-icon icon-folder-open-alt"></i>Add Book Category
                </a>
            </li>
            <li>
                <a href="{{ URL::route('add-books') }}">
                    <i class="menu-icon icon-folder-open-alt"></i>Add Books
                </a>
            </li>
	            </ul>
	        </li>
            <li class="active">
	            <a href="#booksIssueSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">BOOK ISSUES</a>
	            <ul class="collapse list-unstyled" id="booksIssueSubmenu">
                <li>
                <a href="{{ URL::route('issue-return') }}">
                    <i class="menu-icon icon-signout"></i>Issue / Return Books
                </a>
            </li>
            <li>
                <a href="{{ URL::route('currently-issued') }}">
                    <i class="menu-icon icon-list-ul"></i>View all currently issued books  
                </a>
            </li>
	            </ul>
	          </li>
              <li>
                <a href="{{ URL::route('settings') }}">
                    <i class="menu-icon icon-cog"></i>Add Settings
                </a>
            </li>
        </ul>
        
        <ul class="widget widget-menu unstyled">
            <li><a href="{{ URL::route('account-sign-out') }}"><i class="menu-icon icon-wrench"></i>Logout </a></li>
        </ul>
    </div>
</div>
