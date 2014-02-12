This extension allows theme developers to target their layout updates to multiple layout handles at once.

###Installation
Simply copy, paste the app directory merging with the app directory in your magento installation

OR use modman (skip to last step if you have used modman before)-

* In magento admin, go to System > Configuration > Advanced > Developer > Template Settings. Change `Allow Symlinks` to `Yes`, if it's not already.
* Get `modman` from its repo, by doing a `git clone https://github.com/colinmollenhour/modman.git`
* Copy modman to magento root `cp modman/modman /path/to/magento/root/modman`
* Inside magento root, do `modman init`
* Then run the command in your magento root `modman clone https://github.com/mridul89/MultipleHandles.git`.

###Usage
After Installation, you can use an `ifhandle` attribute in your layout files. For example, this will only apply if both `catalog_product_view` & `customer_logged_in` handles exist

    <catalog_product_view ifhandle="customer_logged_in">
        <reference name="content">
            ...
        </reference>
    </catalog_product_view>

You can also use more than 1 layout handles in the attribute value, separate each one of them with spaces
