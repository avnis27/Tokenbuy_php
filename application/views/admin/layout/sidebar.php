<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url();?>webroot/admin/dist/img/avatar3.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Hello, 
					<?php 
						echo $this->user;
					?>
				</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
			<li class="<?php echo ($this->uri->segment(2)=='dashboard')?'active':''?>">
				<a href="<?php echo base_url();?>admin/dashboard">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>	
			<li class="<?php echo ($this->uri->segment(2)=='account')?'active':''?>">
				<a href="<?php echo base_url();?>admin/account">
					<i class="fa fa-book"></i> <span>Account</span>
				</a>
			</li>		
			<li class="<?php echo ($this->uri->segment(2)=='booking')?'active':''?>">
				<a href="<?php echo base_url();?>admin/booking">
					<i class="fa fa-book"></i> <span>Booking</span>
				</a>
			</li>	
			<li class="<?php echo ($this->uri->segment(2)=='user')?'active':''?>">
				<a href="<?php echo base_url();?>admin/user">
					<i class="fa fa-users"></i> <span>Users</span>
				</a>
			</li>	
			<li class="<?php echo ($this->uri->segment(2)=='tokenSupply')?'active':''?>">
				<a href="<?php echo base_url();?>admin/tokenSupply">
					<i class="fa fa-th"></i> <span>Token supply</span>
				</a>
			</li>	
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>