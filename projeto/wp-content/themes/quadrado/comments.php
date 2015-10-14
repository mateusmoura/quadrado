<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				<p>Este post e protegido com senha.Faça login para visualizar os comentários.</p>
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt1';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?> 
	<div class="intro" style="margin-bottom:10px;">
        <ul>
        <?php foreach ($comments as $comment) : ?>
            <li class="<?php echo $oddcomment; ?>" style="list-style-type:decimal;" id="comment-<?php comment_ID() ?>">
                <?php if ($comment->comment_approved == '0') : ?>
          		<em>Seu coment&aacute;rio est&aacute; aguardando modera&ccedil;&#259;o.</em><br />
          		<?php endif; ?>
          		<strong><?php comment_author_link() ?> disse:</strong>
                <small><?php comment_date('j \d\e\ F \d\e\ Y') ?> &agrave;s <?php comment_time() ?><?php edit_comment_link('','',''); ?></small>
                <?php comment_text() ?>
            </li>
        <?php /* Changes every other comment to a different class */
            if ('alt1' == $oddcomment) $oddcomment = 'alt2';
            else $oddcomment = 'alt1';
        ?>
        <?php endforeach; /* end for each comment */ ?>
        </ul>
	</div>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p>Coment&aacute;rios fechado.</p>
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<div class="comment">
	<h3>Deixe seu coment&aacute;rio</h3>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    <?php if ( $user_ID ) : ?>
    	<p>Logado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
        <ul>
    <?php else : ?>
            <li>
                <label for="author">Nome <?php if ($req) echo "*"; ?></label>
                <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" class="text"/>
            </li>
            <li>
                <label for="email">Email (n&atilde;o ser&aacute; publicado) <?php if ($req) echo "*"; ?></label>
                <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" class="text"/>
            </li>
            <li>
                <label for="url">Site</label>
                <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" class="text"/>
            </li>
    <?php endif; ?>
    <!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
    		<li>
            	<textarea name="comment" id="comment" cols="50" rows="7" tabindex="4" class="text"></textarea>
            </li>
    	</ul>
        <button name="submit" type="submit" id="submit" tabindex="5" value="Enviar Coment&aacute;rio" class="bt_send">Enviar Coment&aacute;rio</button>
    	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
    	<?php do_action('comment_form', $post->ID); ?>
    	<p>(*)campos obrigat&oacute;rios.</p>
    </form>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
