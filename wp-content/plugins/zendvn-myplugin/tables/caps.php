<?php
class Zendvn_Mp_Article_Caps
{
    public function __construct()
    {
    }

    public function add_caps_for_role()
    {
        $admin = array(
            'zendvn_mp_articles',
            'zendvn_mp_article_list',
            'zendvn_mp_article_add',
            'zendvn_mp_article_edit',
            'zendvn_mp_article_delete',
            'zendvn_mp_article_status'
        );
        $role = get_role('administrator');
        foreach ($admin as $val) {
            $role->add_cap($val);
        }

        $editor = array(
            'zendvn_mp_articles',
            'zendvn_mp_article_list',
            'zendvn_mp_article_add',
            'zendvn_mp_article_own_edit',
            'zendvn_mp_article_own_delete',
            'zendvn_mp_article_own_status'
        );
        $role = get_role('editor');
        foreach ($editor as $val) {
            $role->add_cap($val);
        }

        $author = array(
            'zendvn_mp_articles',
            'zendvn_mp_article_own_list',
            'zendvn_mp_article_add',
            'zendvn_mp_article_own_edit',
            'zendvn_mp_article_own_status'
        );
        $role = get_role('author');
        foreach ($author as $val) {
            $role->add_cap($val);
        }
    }

    private function cap_list()
    {
        $caps = array(
            'zendvn_mp_article_list' => 'Hien thi danh sach bai viet',
            'zendvn_mp_article_own_list' => 'Hien thi danh sach bai viet theo tac gia',
            'zendvn_mp_article_add' => 'Them mot bai viet moi',
            'zendvn_mp_article_edit' => 'Chinh sua mot bai viet',
            'zendvn_mp_article_own_edit' => 'Chinh sua nhung bai viet theo tac gia',
            'zendvn_mp_article_delete' => 'Xoa cac bai viet',
            'zendvn_mp_article_own_delete' => 'Xoa cac bai viet theo tac gia',
            'zendvn_mp_article_status' => 'Thay doi trang thai cac bai viet',
            'zendvn_mp_article_own_status' => 'Thay doi trang thai cac bai viet theo tac giac'
        );
        return $caps;
    }
}
