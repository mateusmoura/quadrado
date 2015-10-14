    <aside>
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
        <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
            <input type="text" name="s" id="s" />
            <button type="submit" title="Buscar" class="bt_search">Buscar</button>
        </form>
        <div class="category">
            <h3>Categorias</h3>
            <ul>
                <?php wp_list_categories('show_count=1'); ?>
            </ul>
        </div>
        <div class="files">
            <h3>Arquivos</h3>
            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul>
        </div>
        <div class="blogroll">
            <h3>Blogroll</h3>
            <ul>
                <?php get_links(2, '<li>', '</li>', '', '', 'name'); ?>
            </ul>
        </div>
        <?php endif; ?>
    </aside>