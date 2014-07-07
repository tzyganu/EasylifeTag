Easylife Tag v0.1.0
===========

A small magento extension that turns your tags urls from 'tag/product/list/tagId/10' to 'tag/tag-here'

**Compatibility:**
Magento CE 1.7.0.2 and later. Most probably it works on older versions. I just didn't test.

**What it does**

It changes the urls for tag pages from `tag/product/list/tagId/10` to `tag/clothes`.

**Rewrites**

The extension rewrites one model `Mage_Tag_Model_Tag` and one resource model `Mage_Tag_Model_Resource_Tag`.

**Uninstall**

Just remove the folder `app/code/community/Easylife/Tag/` and the file `app/etc/module/Easylife_Tag.xml`

**Idea**

The idea came from <a href="http://stackoverflow.com/q/24608684/2047249" target="_blank">this SO question </a>

**Issues**

This might introduce a very (very very) small overhead in the tag pages, because of a new router and because it loads the tag model again.
<a href="https://github.com/tzyganu/EasylifeTag/issues" target="_blank">Please report any other issues here.</a>



