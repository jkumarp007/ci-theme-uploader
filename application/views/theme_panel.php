<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
<body>
<div id="container">
	<h1>Theme panel</h1>

	

	<div id="body">

	<div>
		<p style="color:red"><?php echo $this->session->flashdata('theme_error_msg'); ?></p>

		<?php echo form_open_multipart(base_url().'theme/upload_theme') ?>	
		<span> Upload theme here</span> <input type="file" name="theme" placeholder="Upload theme">
		<button type="submit">Upload</button>
		<?php echo form_close(); ?>
	</div>

	
		<?php if(!empty($themes)): $total_themes=count($themes); ?>
		<table cellpadding="10" cellspacing="10">
			<tr>
		<?php $i=0;foreach($themes as $theme): $i++;?>
		<td>
			<h3><?php echo $theme->theme_name ?></h3>
				<?php //if($theme->is_active==='1') $theme_url='../'; else $theme_url=base_url('theme/preview_theme/'.$theme->id); ?>
				
				<a target="_BLANK" href="<?php echo base_url('theme/preview/'.$theme->id) ?>" title="">
					<img src="<?php echo base_url() ?>assets/themes/<?php echo $theme->dir_path."/screenshot.png"; ?>" height="300" width="300" alt=""></a>
				<p><?php echo $theme->description ?>
				</p>
			<?php if($theme->is_active==='1'): ?>
				Activated
			<?php else: ?>
				<a href="<?php echo base_url() ?>theme/theme_action/<?php echo $theme->id ?>/Activate" title="">Activate</a>
		
			 | 	<a onclick="return confirm('Are you sure?');" href="<?php echo base_url() ?>theme/theme_action/<?php echo $theme->id ?>/Delete" title="">Delete</a>

			<?php endif; ?>

			</td>
		<?php if($i%3===0) echo "</tr>";?>
		<?php endforeach; ?>

		<?php endif; ?>
		</table>
	</div>

	
</div>

</body>
</html>