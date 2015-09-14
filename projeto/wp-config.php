<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'quadrado');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'root');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'GmWiO.*3~.UwHY_teA8Ua4~Zx&:<+5qZQ%tUvzVK|dHROUmH|iG6#)^euJEKqvt;');
define('SECURE_AUTH_KEY',  'f+SBTD~[xiSK[L}N1Pli|5=]KB|u3*%LvFdxqmT}uA|*9Ww|qup7$]Fj%ZJ+WeSp');
define('LOGGED_IN_KEY',    'HBX|W-CK3/YR]Q^PM)(j=_O/Viq|pV&?<ajh=VQ6h-?Q|iEcc|k(@g?T|P7+}BBz');
define('NONCE_KEY',        '<cD:e!2-L&|N_}EO(fc$9#M_+GdY-]exUp5i@CM>UVy8ubm<kR_#LL[CRwuEj$cI');
define('AUTH_SALT',        'A.%HY[simp>e3vE#Wec7/TUO4q|w^0%|E<&Lxm.gS65.0eFOgIzo!Ae-!P|J74T2');
define('SECURE_AUTH_SALT', '<@d%OrX$4M|WgbH==KW){}*T3pRwv#]xhbHb&hrL</>qA*>Vuk na)7dr]@s5me?');
define('LOGGED_IN_SALT',   '[-QX!Vy%GcEK9V )q8xf?gg,_&*y>+9%i)VqppB1t9T[=Wo%2r-WJ%+|01P3S}*W');
define('NONCE_SALT',       '0K|&$cfFi8MH-./x8Djvf&SZ3Rh435mLRdX.3?({Axu_;^N|48+6FWt2F/{|Qr)U');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_quadrado';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
