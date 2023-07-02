document.addEventListener('DOMContentLoaded', () => {
    const tabsNav = document.querySelectorAll('.tabs-nav__item');
    const tabs = document.querySelectorAll('.tabs__item');
    var tabId;

    const getActiveTabId = (tabNav) => {
        if (tabNav.classList.contains('tabs-nav__item_active')){
            tabId = tabNav.dataset.tabId;
        }
    }
    const toggleTabNav = (tabsNav) => {
        tabsNav.forEach(tabNav => {
            tabNav.addEventListener('click', (e) => {
                const tabNav = e.target;
                tabsNav.forEach(tabNav => {
                    tabNav.classList.remove('tabs-nav__item_active');
                })
                tabNav.classList.add('tabs-nav__item_active');
                getActiveTabId(tabNav);
                toggleTab(tabId);
            });
            getActiveTabId(tabNav)
        });
    }
    const toggleTab = (tabId) => {
        tabs.forEach(tab => {
            tab.classList.remove('tabs__item_active');
            if (tab.id == tabId) {
                tab.classList.add('tabs__item_active');
            }
        })
    }

    toggleTabNav(tabsNav);
    toggleTab(tabId);
  
})