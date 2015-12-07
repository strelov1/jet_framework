<?php

namespace Models;


class Article extends ActiveRecords
{
    protected function tableName()
    {
        return 'article';
    }
}