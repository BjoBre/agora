<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'AgoraTeam.' . $_EXTKEY,
    'Forum',
    array(
        'Forum' => 'list',
        'Thread' => 'list, delete, edit, update, new, create',
        'Post' => 'list, show, showHistory, delete, confirmDelete, edit, update, new, create',
        'Rating' => 'rate',
        'User' => 'addObservedThread, removeObservedThread, addFavoritePost, removeFavoritePost',
        'Attachment' => 'download'
    ),
    array(
        'Forum' => 'list',
        'Thread' => 'list, delete, edit, update, new, create',
        'Post' => 'list, show, showHistory, delete, confirmDelete, edit, update, new, create',
        'User' => 'addObservedThread, removeObservedThread, addFavoritePost, removeFavoritePost',
        'Attachment' => 'download',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'AgoraTeam.' . $_EXTKEY,
    'Widgets',
    array(
        'Post' => 'listLatest',
        'Thread' => 'listLatest',
        'User' => 'favoritePosts, observedThreads, removeObservedThread, removeFavoritePost'
    ),
    array(
        'Post' => 'listLatest',
        'Thread' => 'listLatest',
        'User' => 'favoritePosts, observedThreads, removeObservedThread, removeFavoritePost'
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'AgoraTeam.' . $_EXTKEY,
    'Forumpages',
    array(
        'User' => 'removeObservedThread, listObservedThreads',
    ),
    array(
        'User' => 'removeObservedThread, listObservedThreads',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'AgoraTeam.' . $_EXTKEY,
    'Ajax',
    array(
        'Rating' => 'rate',
        'Tag' => 'autocomplete, list',
    ),
    array(
        'Rating' => 'rate',
        'Tag' => 'autocomplete, list',
    )
);

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][] =
    AgoraTeam\Agora\Hooks\Tcemain::class;
