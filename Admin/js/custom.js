

window.addEventListener("load", function() {
    if (typeof jQuery !== 'undefined') {
        // Add the left container without the logo image
        jQuery("div.ew-login-box").prepend(
            jQuery("<div>", {
                class: "left-container", 

            })
        );
        
        // Add decorative elements to the left container
        jQuery(".left-container").append(
            jQuery("<div>", {
                class: "shape-1",
            }),
            jQuery("<div>", {
                class: "shape-2",

            }),
            jQuery("<div>", {
                class: "shape-3",

            }),
            jQuery("<div>", {
                class: "shape-4",

            }),
            jQuery("<div>", {
                class: "shape-5",

            }),
            // Add welcome text based on your screenshot
            jQuery("<div>", {
                class: "welcome-text",

            }).append(
                jQuery("<h1>", {
                    // text: "Welcome to ITBS Shopping Cart!",

                }),
                jQuery("<p>", {
                    // text: "To keep connected with us please login with your personal info",

                })
            )
        );
        
        // Style the login form (right side)
        const $loginCard = jQuery("div.ew-login-box > div.ew-login-card");
        

        // Remove default card header if present and create a clean form look
        $loginCard.find(".card-header").remove();
        
        // Add form title
        $loginCard.find(".card-body").prepend(
            jQuery("<h2>", {
                text: "Sign in to start your session",

            })
        );

    }
    if (window.jQuery) {
    $("body > div.ew-login-box > div.card.ew-login-card").removeClass("card");
} else {
    console.log("jQuery is not loaded.");
}
});

function initializePackageSystemsTableSortable() {
    setTimeout(function() {
        const specificTable = document.querySelector('#tbl_package_systemsgrid');
        
        if (specificTable) {
            const tbody = specificTable.querySelector('tbody');
            
            if (tbody) {
                // Clear existing sortable instance if it exists
                if (tbody.sortableInstance) {
                    try {
                        tbody.sortableInstance.destroy();
                        tbody.sortableInstance = null;
                    } catch (e) {
                        // Ignore destroy errors
                        console.warn('Sortable destroy error (ignored):', e);
                    }
                }
                
                // Remove the initialized flag to allow re-initialization
                specificTable.removeAttribute('data-sortable-initialized');
                
                // Add drag handle column header (only if not exists)
                addDragHandleToPackageSystemsTable(specificTable);
                
                // Clean and re-add drag handles to all rows
                const rows = tbody.querySelectorAll('tr');
                rows.forEach(function(row, index) {
                    // Remove existing drag handles first
                    const existingDragCell = row.querySelector('.package-systems-drag-cell');
                    if (existingDragCell) {
                        existingDragCell.remove();
                    }
                    
                    // Add fresh drag handle
                    addDragHandleToPackageSystemRow(row, index);
                });
                
                // Mark as initialized
                specificTable.setAttribute('data-sortable-initialized', 'true');
                
                // Initialize Sortable and store reference
                try {
                    const sortableInstance = Sortable.create(tbody, {
                        animation: 150,
                        ghostClass: 'sortable-ghost',
                        chosenClass: 'sortable-chosen',
                        dragClass: 'sortable-drag',
                        handle: '.package-systems-drag-handle',
                        onStart: function(evt) {
                            evt.item.classList.add('dragging');
                        },
                        onEnd: function(evt) {
                            evt.item.classList.remove('dragging');
                            
                            if (evt.oldIndex !== evt.newIndex) {
                                console.log(`Package Systems: Row moved from ${evt.oldIndex} to ${evt.newIndex}`);
                                
                                // Delay re-initialization to prevent conflicts
                                setTimeout(() => {
                                    initializePackageSystemsTableSortable();
                                }, 200);
                            }
                        }
                    });
                    
                    // Store reference to sortable instance
                    tbody.sortableInstance = sortableInstance;
                } catch (e) {
                    console.error('Error creating sortable:', e);
                }
            }
        }
    }, 1000);
}

function addDragHandleToPackageSystemsTable(table) {
    const thead = table.querySelector('thead');
    if (thead) {
        const headerRow = thead.querySelector('tr');
        if (headerRow && !headerRow.querySelector('.package-systems-drag-header')) {
            const dragHeaderCell = document.createElement('th');
            dragHeaderCell.className = 'package-systems-drag-header';
            dragHeaderCell.style.cssText = `
                width: 50px !important;
                min-width: 50px !important;
                text-align: center !important;
                font-weight: 600 !important;
            `;
            dragHeaderCell.innerHTML = `
                <i class="fas fa-arrows-alt" title="Drag to reorder" style="color: #ffffffff;"></i>
            `;
            
            // Insert as first column
            headerRow.insertBefore(dragHeaderCell, headerRow.firstChild);
        }
    }
}

function addDragHandleToPackageSystemRow(row, index) {
    const dragCell = document.createElement('td');
    dragCell.className = 'package-systems-drag-cell';
    dragCell.style.cssText = `

    `;
    
    dragCell.innerHTML = `
        <button class="package-systems-drag-handle" title="Drag to reorder system" style="
            background: none;
            border: none;
            cursor: grab;
            color: #6c757d;
            font-size: 18px;
            padding: 10px;
            border-radius: 6px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        ">
            <i class="fas fa-grip-vertical"></i>
        </button>
    `;
    
    // Insert as first column
    row.insertBefore(dragCell, row.firstChild);
}

window.addEventListener("load", function() {
    if (typeof jQuery !== 'undefined') {
        const object = document.createElement('object');
        object.setAttribute('type', 'image/svg+xml');
        object.setAttribute('data', 'app/assets/ITBS-Logo-animated.svg');
        object.setAttribute('width', '200');
        object.style.maxWidth = '500px';
        object.style.height = 'auto';
        object.style.display = 'block';
        object.style.margin = '0 auto';
        
        // Add class for CSS targeting
        object.classList.add('svg-logo');
        
        // Add event listener to modify the SVG once it's loaded
        object.addEventListener('load', function() {
            try {
                // Get the SVG document inside the Object tag
                const svgDoc = object.contentDocument;
                
                // Check if dark mode is active
                const isDarkMode = document.documentElement.getAttribute('data-bs-theme') === 'dark';
                
                // If we have access to the SVG document
                if (svgDoc) {
                    // Find the root SVG element
                    const svgRoot = svgDoc.querySelector('svg');
                    
                    if (svgRoot) {
                        // Set background color based on theme
                        svgRoot.style.backgroundColor = isDarkMode ? '#212529' : '';
                        
                        // If the SVG has a background rect element, you can target that too
                        const backgroundElements = svgDoc.querySelectorAll('rect');
                        backgroundElements.forEach(rect => {
                            // Check if this might be a background element
                            if (rect.width.baseVal.value > svgRoot.width.baseVal.value * 0.9 &&
                                rect.height.baseVal.value > svgRoot.height.baseVal.value * 0.9) {
                                rect.setAttribute('fill', isDarkMode ? '#212529' : '');
                                // Add class for CSS targeting
                                rect.classList.add('background');
                            }
                        });
                    }
                }
            } catch (e) {
                console.error('Error modifying SVG:', e);
            }
        });

        const container = jQuery("<div>", {
            class: "logo-container",
            css: {
                "text-align": "center",
                "padding": "20px",
                "margin-bottom": "15px"
            }
        });

        container.append(object);
        jQuery("div.ew-login-box > div.card.ew-login-card > div").prepend(container);
    }

  

    // Initialize table sorting
    initializePackageSystemsTableSortable();
    
    // Re-initialize after PHPMaker AJAX updates
    if (typeof jQuery !== 'undefined') {
        jQuery(document).ajaxComplete(function() {
            setTimeout(initializePackageSystemsTableSortable, 500);
        });
    }

});

(function () {
  "use strict";

  // Prevent multiple initializations
  if (window.phpmakerScriptInitialized) return;
  window.phpmakerScriptInitialized = true;

  let currentMode = "light";
  let currentTheme = "blue";
  let initializationComplete = false;

  // Complete theme definitions (your original themes)
//   const themes = {
//     blue: {
//       light: {
//         "--body": "linear-gradient(180deg, #FFF 0%, #EEF1F4 100%)",
//         "--navbar-border": "3px solid rgb(0, 9, 129)",
//         "--navbar": "rgb(229, 231, 235)",
//         "--main-sidebar": "rgba(15, 60, 95, 1)",
//         "--metrics-card":
//           "linear-gradient(98deg, #081F62 0.54%, #003B7F 99.46%)",
//         "--metrics-card-text": "rgb(255, 255, 255)",
//         "--metrics-card-btn-text": "rgb(255, 255, 255)",
//         "--metric-card-icon-bg": "rgb(255, 255, 255)",
//         "--metric-card-icon": "rgba(15, 60, 95, 1)",
//         "--card-wrapper": "rgb(255, 255, 255)",
//         "--card-border": " rgba(208, 214, 221, 1)",
//         "--user-container-card": "rgba(242, 243, 245, 0.2)",
//         "--menu-focus": "rgba(1, 31, 89, 1)",
//         "--menu-focus-treeview": "rgb(1, 31, 89, .5)",
//         "--menu-focus-text": "rgba(252, 209, 22, 1)",
//         "--menu-list": "rgb(255, 255, 255)",
//         "--icon-menu": "rgb(15, 60, 95)",
//         "--title-font": "rgb(75, 85, 99)",
//         "--btn-text": "rgb(15, 60, 95)",
//         "--btn-bg": "rgba(208, 214, 221, 1)",
//         "--btn-hover": "rgba(0, 56, 168, 1)",
//         "--btn-hover-text": "rgb(255, 255, 255)",
//         "--btn-primary": "rgba(0, 56, 168, 1)",
//         "--btn-info": "rgba(15, 60, 95, 1)",
//         "--btn-success": "rgba(0, 121, 5, 1)",
//         "--btn-warning": "rgba(206, 17, 38, 1)",
//         "--btn-hover-primary": "rgb(1, 33, 95)",
//         "--btn-hover-info": "rgb(3, 26, 44)",
//         "--btn-hover-success": "rgb(2, 66, 4)",
//         "--btn-hover-warning": "rgb(117, 4, 17)",
//         "--add-btn-bg": "rgba(15, 60, 95, 1)",
//         "--add-btn-hover": "rgb(0, 39, 197)",
//         "--view-btn-bg": "rgb(0, 100, 194)",
//         "--view-btn-hover": "rgb(2, 82, 156)",
//         "--edit-btn-bg": "rgb(13, 202, 240)",
//         "--edit-btn-hover": "rgb(0, 162, 194)",
//         "--delete-btn-bg": "rgb(220, 53, 69)",
//         "--delete-btn-hover": "rgb(167, 26, 40)",
//         "--table-header": "rgba(15, 60, 95, 1)",
//         "--table-footer-bg": "rgb(229, 231, 235)",
//       },
//       dark: {
//         "--body": "rgba(19, 25, 31, 1)",
//         "--navbar": "rgba(46, 51, 56, 1)",
//         "--main-sidebar": "rgba(28, 31, 34, 1)",
//         "--metrics-card": "rgba(208, 214, 221, 0.2)",
//         "--metrics-card-text": "rgb(255, 255, 255)",
//         "--metrics-card-btn-text": "rgb(255, 255, 255)",
//         "--metric-card-icon-bg": "rgb(255, 255, 255)",
//         "--metric-card-icon": "rgba(15, 60, 95, 1)",
//         "--card-wrapper": "rgb(26, 38, 51)",
//         "--card-border": " rgb(26, 38, 51)",
//         "--user-container-card": "rgba(15, 60, 95, 1)",
//         "--menu-focus": "rgba(1, 31, 89, 1)",
//         "--menu-focus-treeview": "rgb(1, 31, 89, .5)",
//         "--menu-focus-text": "rgba(252, 209, 22, 1)",
//         "--menu-list": "rgb(255, 255, 255)",
//         "--icon-menu": "rgb(255, 255, 255)",
//         "--btn-text": "rgb(255, 255, 255)",
//         "--btn-bg": "rgba(208, 214, 221, .2)",
//         "--btn-hover": "rgb(0, 78, 233)",
//         "--btn-primary": "rgba(0, 56, 168, 1)",
//         "--btn-info": "rgba(15, 60, 95, 1)",
//         "--btn-success": "rgba(0, 121, 5, 1)",
//         "--btn-warning": "rgba(206, 17, 38, 1)",
//         "--btn-hover-primary": "rgba(0, 56, 168, 1)",
//         "--btn-hover-info": "rgba(15, 60, 95, 1)",
//         "--btn-hover-success": "rgba(0, 121, 5, 1)",
//         "--btn-hover-warning": "rgba(206, 17, 38, 1)",
//         "--btn-hover-text": "rgb(255, 255, 255)",
//         "--add-btn-bg": "rgba(15, 60, 95, 1)",
//         "--add-btn-hover": "rgb(0, 39, 197)",
//         "--view-btn-bg": "rgb(0, 100, 194)",
//         "--view-btn-hover": "rgb(2, 82, 156)",
//         "--edit-btn-bg": "rgb(13, 202, 240)",
//         "--edit-btn-hover": "rgb(0, 162, 194)",
//         "--delete-btn-bg": "rgb(220, 53, 69)",
//         "--delete-btn-hover": "rgb(167, 26, 40)",
//         "--table-header": "rgb(11, 43, 68)",
//         "--table-footer-bg": "rgba(208, 214, 221, .2)",
//       },
//     },
//     fourthTheme: {
//       light: {
//         "--body": "linear-gradient(180deg, #FFF 0%, #FFF0F3 100%)",
//         "--navbar-border": "rgba(206, 17, 38, 1)",
//         "--navbar": "rgba(206, 17, 38, 1)",
//         "--main-sidebar": "rgba(0, 56, 168, 1)",
//         "--metrics-card": "rgb(255, 255, 255)",
//         "--metrics-card-text": "rgb(26, 26, 26)",
//         "--metrics-card-btn-text": "rgb(255, 255, 255)",
//         "--metric-card-icon-bg": "rgba(206, 17, 38, 1)",
//         "--metric-card-icon": "rgb(255, 255, 255)",
//         "--card-wrapper": "rgb(255, 255, 255)",
//         "--user-container-card": "rgba(253, 237, 243, 0.2)",
//         "--menu-focus": "rgba(1, 31, 89, 1)",
//         "--menu-focus-treeview": "rgb(1, 31, 89, .5)",
//         "--menu-focus-text": "rgb(130, 172, 255)",
//         "--menu-list": "rgb(255, 255, 255)",
//         "--icon-menu": "rgb(255, 255, 255)",
//         "--title-font": "rgb(75, 85, 99)",
//         "--btn-text": "rgb(1, 0, 54)",
//         "--btn-bg": "rgba(208, 214, 221, 1)",
//         "--btn-hover": "rgba(206, 17, 38, 1)",
//         "--btn-hover-text": "rgb(255, 255, 255)",
//         "--btn-primary": "rgba(206, 17, 38, 1)",
//         "--btn-info": "rgba(0, 56, 168, 1)",
//         "--btn-success": "rgba(0, 159, 90, 1)",
//         "--btn-warning": "rgba(247, 145, 0, 1)",
//         "--btn-hover-primary": "rgb(170, 2, 21)",
//         "--btn-hover-info": "rgb(5, 110, 65)",
//         "--btn-hover-success": "rgb(2, 66, 4)",
//         "--btn-hover-warning": "rgb(197, 115, 0)",
//         "--add-btn-bg": "rgba(15, 60, 95, 1)",
//         "--add-btn-hover": "rgb(0, 39, 197)",
//         "--view-btn-bg": "rgb(0, 100, 194)",
//         "--view-btn-hover": "rgb(2, 82, 156)",
//         "--edit-btn-bg": "rgb(13, 202, 240)",
//         "--edit-btn-hover": "rgb(0, 162, 194)",
//         "--delete-btn-bg": "rgb(220, 53, 69)",
//         "--delete-btn-hover": "rgb(167, 26, 40)",
//         "--table-header": "rgba(0, 56, 168, 1)",
//         "--table-footer-bg": "rgb(229, 231, 235)",
//       },
//       dark: {
//         "--body": "rgb(18, 18, 18)",
//         "--navbar": "rgb(33, 33, 33)",
//         "--main-sidebar": "rgba(0, 56, 168, 0.24)",
//         "--metrics-card": "rgba(253, 108, 124, 0.15)",
//         "--metrics-card-text": "rgb(255, 255, 255)",
//         "--metrics-card-btn-text": "rgb(255, 255, 255)",
//         "--metric-card-icon-bg": "rgb(97, 97, 97)",
//         "--metric-card-icon": "rgb(255, 255, 255)",
//         "--card-wrapper": "rgba(0, 56, 168, 0.15)",
//         "--card-border": " rgb(33, 33, 33)",
//         "--user-container-card": "rgba(30, 104, 160, .8)",
//         "--menu-focus": "rgba(30, 104, 160, 1)",
//         "--menu-focus-treeview": "rgba(0, 0, 0, 0.7)",
//         "--menu-focus-text": "rgb(255, 255, 255)",
//         "--menu-list": "rgb(255, 255, 255)",
//         "--icon-menu": "rgb(255, 255, 255)",
//         "--btn-text": "rgb(255, 255, 255)",
//         "--btn-bg": "rgba(208, 214, 221, .2)",
//         "--btn-hover-text": "rgb(255, 255, 255)",
//         "--btn-primary": "rgba(206, 17, 38, 1)",
//         "--btn-info": "rgba(0, 56, 168, 1)",
//         "--btn-success": "rgba(0, 159, 90, 1)",
//         "--btn-warning": "rgba(247, 145, 0, 1)",
//         "--btn-hover-primary": "rgb(170, 2, 21)",
//         "--btn-hover-info": "rgb(5, 110, 65)",
//         "--btn-hover-success": "rgb(2, 66, 4)",
//         "--btn-hover-warning": "rgb(197, 115, 0)",
//         "--add-btn-bg": "rgba(15, 60, 95, 1)",
//         "--add-btn-hover": "rgb(0, 39, 197)",
//         "--view-btn-bg": "rgb(0, 100, 194)",
//         "--view-btn-hover": "rgb(2, 82, 156)",
//         "--edit-btn-bg": "rgb(13, 202, 240)",
//         "--edit-btn-hover": "rgb(0, 162, 194)",
//         "--delete-btn-bg": "rgb(220, 53, 69)",
//         "--delete-btn-hover": "rgb(167, 26, 40)",
//         "--table-header":
//           "linear-gradient(98deg, #081F62 0.54%, #003B7F 99.46%)",
//         "--table-footer-bg": "rgba(208, 214, 221, .2)",
//       },
//     },
//   };

  // Chart colors (your original chart colors)
//   const chartColors = {
//     blue: {
//       light: {
//         borderColor: ["rgba(0, 56, 168, 0)"],
//         gridColor: "rgba(0, 0, 0, 0.1)",
//         textColor: "rgb(21, 165, 248)",
//       },
//       dark: {
//         borderColor: ["rgba(0, 78, 233, 0)"],
//         gridColor: "rgba(255, 255, 255, 0.1)",
//         textColor: "rgba(255, 255, 255, 1)",
//       },
//     },
//     fourthTheme: {
//       light: {
//         borderColor: ["rgba(233, 30, 99, 0)"],
//         gridColor: "rgba(0, 0, 0, 0.1)",
//         textColor: "rgb(21, 74, 248)",
//       },
//       dark: {
//         borderColor: ["rgba(233, 30, 99, 0)"],
//         gridColor: "rgba(255, 255, 255, 0.1)",
//         textColor: "rgba(255,255,255, 1)",
//       },
//     },
//   };

  // SINGLE window load listener instead of multiple
  function handleWindowLoad() {
    if (initializationComplete) return;
    initializationComplete = true;

    // Batch all DOM manipulations
    performDOMOperations();
    createCollapsibleControls();
    setupEventListeners();
    setupCollapsibleEventListeners();
    loadSavedPreferences();

    console.log("PHPMaker script initialized once");
  }

  // All DOM operations in one function to avoid multiple reflows
  function performDOMOperations() {
    if (typeof jQuery === "undefined") return;

    // Reorganize search elements
    const searchElement = jQuery(".ew-form.ew-ext-search-form");
    const mainContentElement = jQuery(
      "body > div.wrapper.ew-layout > div.content-wrapper > section > div > main"
    );

    if (searchElement.length && mainContentElement.length) {
      const wrapperDiv = jQuery("<div>", { class: "search-container" });
      searchElement.detach();
      mainContentElement.detach();
      wrapperDiv.append(searchElement, mainContentElement);
      jQuery(
        "body > div.wrapper.ew-layout > div.content-wrapper > section > div"
      ).append(wrapperDiv);
    }

    // Setup toolbar elements
    const toolbarElement = jQuery(
      "body > div.wrapper.ew-layout > div.content-wrapper > section > div > div.btn-toolbar.ew-toolbar"
    );
    const mainElement = jQuery(
      "body > div.wrapper.ew-layout > div.content-wrapper > section > div > main"
    );

    if (toolbarElement.length && mainElement.length) {
      const containerDiv = jQuery("<div>", {
        class: "custom-content-container",
      });
      toolbarElement.detach();
      mainElement.detach();
      containerDiv.append(toolbarElement, mainElement);
      jQuery(
        "body > div.wrapper.ew-layout > div.content-wrapper > section > div"
      ).append(containerDiv);
    }

    // Wrap info icons
    const iconSpans = jQuery("span.info-box-icon");
    if (iconSpans.length) {
      iconSpans.wrap("<div class='icon-wrapper'></div>");
    }

    // Wrap elements
    const element1 = document.querySelector(
      "div.search-container > form > div > div > div.col-sm-auto.px-0.pe-sm-2"
    );
    const element2 = document.querySelector(
      "div.search-container > form > div > div > div.col-sm-auto.mb-3"
    );
    const parentContainer = document.querySelector(
      "div.search-container > form > div > div"
    );

    if (element1 && element2 && parentContainer) {
      const wrapperDiv = document.createElement("div");
      wrapperDiv.className = "elements-wrapper";
      wrapperDiv.appendChild(element1);
      wrapperDiv.appendChild(element2);
      parentContainer.appendChild(wrapperDiv);
    }

    // Initial button symbols
    updateButtonSymbols();
  }

  // Function to update button symbols (debounced)
  let buttonUpdateTimeout;
  function updateButtonSymbols() {
    clearTimeout(buttonUpdateTimeout);
    buttonUpdateTimeout = setTimeout(() => {
      const addElement = document.querySelector(
        "body > div.wrapper.ew-layout > div.content-wrapper > section > div > div.custom-content-container > div > div.ew-action-option.d-inline-block.text-nowrap > div > a.ew-add"
      );

      const editElement = document.querySelector(
        "body > div.wrapper.ew-layout > div.content-wrapper > section > div > div.custom-content-container > div > div.ew-action-option.d-inline-block.text-nowrap > div > a.ew-edit"
      );

      const deleteElement = document.querySelector(
        "body > div.wrapper.ew-layout > div.content-wrapper > section > div > div.custom-content-container > div > div.ew-action-option.d-inline-block.text-nowrap > div > a.ew-delete"
      );

      const copyElement = document.querySelector(
        "body > div.wrapper.ew-layout > div.content-wrapper > section > div > div.custom-content-container > div > div.ew-action-option.d-inline-block.text-nowrap > div > a.ew-copy"
      );

      if (addElement || editElement || deleteElement || copyElement) {
        addElement.textContent = "✚ " + addElement.textContent;
        editElement.textContent = "✏️ " + editElement.textContent;
        deleteElement.textContent = "🗑️ " + deleteElement.textContent;
        copyElement.textContent = "📋 " + copyElement.textContent;
      }

      const sourceElement = document.querySelector("#ew-list > div > div > div.ew-list-other-options");
      const targetDiv = document.querySelector("div.search-container > form > div > div");
      
      if (sourceElement && targetDiv) {
        if (!targetDiv.contains(sourceElement)) {
          targetDiv.appendChild(sourceElement);
          console.log("Successfully moved the element to the target div");
        }
      }
      
      const element = document.querySelector("div.ew-list-other-options > div > div > a.ew-add");
      const element2 = document.querySelector("#femployeesrch_search_panel > div > div.ew-list-other-options > div.ew-detail-option.d-inline-block.text-nowrap > div > a.ew-detail-add");
      
      if (element && !element.textContent.includes("✚")) {
        element.textContent = "✚ " + element.textContent;
        console.log("Added symbol to first button");
      }
      
      if (element2 && !element2.textContent.includes("✚")) {
        element2.textContent = "✚ " + element2.textContent;
        console.log("Added symbol to second button");
      }

    }, 100);
  }

  // SINGLE mutation observer instead of multiple
  let observer;
  function setupMutationObserver() {
    if (observer) return; // Prevent multiple observers

    observer = new MutationObserver(function (mutations) {
      let needsUpdate = false;

      for (const mutation of mutations) {
        if (mutation.type === "childList" && mutation.addedNodes.length > 0) {
          for (const node of mutation.addedNodes) {
            if (node.nodeType === Node.ELEMENT_NODE) {
              if (
                (node.matches &&
                  node.matches(
                    "a.ew-add, a.ew-edit, a.ew-delete, a.ew-copy"
                  )) ||
                (node.querySelector &&
                  node.querySelector(
                    "a.ew-add, a.ew-edit, a.ew-delete, a.ew-copy"
                  ))
              ) {
                needsUpdate = true;
                break;
              }
            }
          }
        }
        if (needsUpdate) break;
      }

      if (needsUpdate) {
        updateButtonSymbols();
      }
    });

    observer.observe(document.body, { childList: true, subtree: true });
  }

  // Create collapsible controls (replaces createThemeControls and createFontControls)
//   function createCollapsibleControls() {
//     if (document.getElementById('controls-container')) return;

//     const controlsHTML = `
//         <button id="controls-toggle" title="Settings">
//             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
//                 <path d="M15 18l-6-6 6-6"/>
//             </svg>
//         </button>
        
//         <div id="controls-container">
//             <div class="controls-section">
//                 <h4>Theme Settings</h4>
//                 <div style="margin-bottom: 15px;">
//                     <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
//                         <span>Mode</span>
//                         <label class="theme-switch" style="background: grey; border-radius: 20px; position: relative; display: inline-block; width: 50px; height: 24px;">
//                             <input type="checkbox" id="theme-mode-toggle" style="opacity: 0; width: 0; height: 0;">
//                             <span class="slider round" style="position: absolute; cursor: pointer; top: 0; left: 0; bottom: 0; background-color: #ccc; transition: .4s; border-radius: 34px;">
//                                 <span style="position: absolute; content: ''; height: 18px; width: 18px; left: 3px; bottom: 3px; background-color: white; transition: .4s; border-radius: 50%;"></span>
//                             </span>
//                         </label>
//                         <span id="mode-label">Light</span>
//                     </div>
//                 </div>
//                 <div>
//                     <div style="margin-bottom: 8px;">Color Theme</div>
//                     <div style="display: flex; gap: 10px;">
//                         <button class="color-theme-btn" data-theme="blue" style="width: 30px; height: 30px; border-radius: 50%; border: none; background: linear-gradient(135deg, #00308f 50%,#dee2e6 50%); cursor: pointer;"></button>
//                         <button class="color-theme-btn" data-theme="fourthTheme" style="width: 30px; height: 30px; border-radius: 50%; border: none; background: linear-gradient(135deg, #0038a8 50%,#ce1126 50%); cursor: pointer;"></button>
//                     </div>
//                 </div>
//             </div>
            
//             <div class="controls-section">
//                 <h4>Font Size Settings</h4>
//                 <div style="margin-bottom: 12px;">
//                     <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
//                         <span style="font-weight: bold;">All</span>
//                         <span id="body-percentage" class="size-percentage">100%</span>
//                     </div>
//                     <div style="display: flex; align-items: center; gap: 8px;">
//                         <button class="font-size-btn" data-target="body" data-action="decrease" style="width: 30px; height: 30px; border-radius: 5px; border: none; background: #f0f0f0; cursor: pointer;">-</button>
//                         <input type="range" id="body-slider" min="70" max="150" value="100" style="flex-grow: 1;">
//                         <button class="font-size-btn" data-target="body" data-action="increase" style="width: 30px; height: 30px; border-radius: 5px; border: none; background: #f0f0f0; cursor: pointer;">+</button>
//                     </div>
//                 </div>
//                 <div style="margin-bottom: 12px;">
//                     <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
//                         <span style="font-weight: bold;">Button</span>
//                         <span id="button-percentage" class="size-percentage">100%</span>
//                     </div>
//                     <div style="display: flex; align-items: center; gap: 8px;">
//                         <button class="font-size-btn" data-target="button" data-action="decrease" style="width: 30px; height: 30px; border-radius: 5px; border: none; background: #f0f0f0; cursor: pointer;">-</button>
//                         <input type="range" id="button-slider" min="70" max="150" value="100" style="flex-grow: 1;">
//                         <button class="font-size-btn" data-target="button" data-action="increase" style="width: 30px; height: 30px; border-radius: 5px; border: none; background: #f0f0f0; cursor: pointer;">+</button>
//                     </div>
//                 </div>
//                 <div style="margin-bottom: 12px;">
//                     <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
//                         <span style="font-weight: bold;">Input Fields</span>
//                         <span id="input-percentage" class="size-percentage">100%</span>
//                     </div>
//                     <div style="display: flex; align-items: center; gap: 8px;">
//                         <button class="font-size-btn" data-target="input" data-action="decrease" style="width: 30px; height: 30px; border-radius: 5px; border: none; background: #f0f0f0; cursor: pointer;">-</button>
//                         <input type="range" id="input-slider" min="70" max="150" value="100" style="flex-grow: 1;">
//                         <button class="font-size-btn" data-target="input" data-action="increase" style="width: 30px; height: 30px; border-radius: 5px; border: none; background: #f0f0f0; cursor: pointer;">+</button>
//                     </div>
//                 </div>
//                 <div style="margin-bottom: 12px;">
//                     <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
//                         <span style="font-weight: bold;">Table</span>
//                         <span id="td-percentage" class="size-percentage">100%</span>
//                     </div>
//                     <div style="display: flex; align-items: center; gap: 8px;">
//                         <button class="font-size-btn" data-target="td" data-action="decrease" style="width: 30px; height: 30px; border-radius: 5px; border: none; background: #f0f0f0; cursor: pointer;">-</button>
//                         <input type="range" id="td-slider" min="70" max="150" value="100" style="flex-grow: 1;">
//                         <button class="font-size-btn" data-target="td" data-action="increase" style="width: 30px; height: 30px; border-radius: 5px; border: none; background: #f0f0f0; cursor: pointer;">+</button>
//                     </div>
//                 </div>
//                 <div style="text-align: center; margin-top: 15px;">
//                     <button id="reset-all-fonts" style="padding: 8px 20px; background: #5e35b1; color: white; border: none; border-radius: 5px; cursor: pointer;">Reset All</button>
//                 </div>
//             </div>
//         </div>
//     `;

//     document.body.insertAdjacentHTML('beforeend', controlsHTML);
//   }

  // SINGLE event listener setup instead of multiple
  function setupEventListeners() {
    // Single click handler for all elements
    document.addEventListener("click", function (event) {
      const target = event.target;

      // Theme controls
      if (target.matches(".color-theme-btn")) {
        handleThemeChange(target);
      }

      // Font controls
      else if (target.matches(".font-size-btn")) {
        handleFontSizeChange(target);
      } else if (target.id === "reset-all-fonts") {
        resetAllFonts();
      }
    });

    // Single change handler
    document.addEventListener("change", function (event) {
      if (event.target.id === "theme-mode-toggle") {
        handleModeChange(event.target);
      } else if (event.target.matches('select[name="pagelen"]')) {
        setTimeout(updateButtonSymbols, 500);
      }
    });

    // Single input handler for font sliders
    document.addEventListener("input", function (event) {
      if (event.target.matches('input[type="range"][id$="-slider"]')) {
        handleFontSliderChange(event.target);
      }
    });

    // Setup mutation observer
    setupMutationObserver();
  }

  // Setup collapsible event listeners
  function setupCollapsibleEventListeners() {
    document.addEventListener('click', function(event) {
      const target = event.target;
      
      // Toggle controls panel
      if (target.id === 'controls-toggle' || target.closest('#controls-toggle')) {
        const container = document.getElementById('controls-container');
        const toggle = document.getElementById('controls-toggle');
        
        container.classList.toggle('expanded');
        toggle.classList.toggle('expanded');
      }
      
      // Close panel when clicking outside
      else if (!target.closest('#controls-container') && !target.closest('#controls-toggle')) {
        const container = document.getElementById('controls-container');
        const toggle = document.getElementById('controls-toggle');
        
        if (container.classList.contains('expanded')) {
          container.classList.remove('expanded');
          toggle.classList.remove('expanded');
        }
      }
    });
  }

  // Theme functions
//   function applyTheme(theme, mode) {
//     const selectedTheme = themes[theme][mode];

//     for (const property in selectedTheme) {
//       document.documentElement.style.setProperty(
//         property,
//         selectedTheme[property]
//       );
//     }

//     const sidebar = document.querySelector(
//       "body > div.wrapper.ew-layout > aside"
//     );
//     if (sidebar) {
//       sidebar.style.background = selectedTheme["--main-sidebar"];
//     }

//     // Update chart colors
//     applyChartTheme(theme, mode);

//     // Save preferences
//     localStorage.setItem("phpmaker-theme", theme);
//     localStorage.setItem("phpmaker-mode", mode);
//   }

//   function applyChartTheme(theme, mode) {
//     if (typeof Chart !== "undefined") {
//       const colors = chartColors[theme][mode];

//       // Update Chart.js defaults
//       if (Chart.defaults) {
//         if (Chart.defaults.color !== undefined) {
//           Chart.defaults.color = colors.textColor;
//         }

//         if (Chart.defaults.plugins && Chart.defaults.plugins.legend) {
//           Chart.defaults.plugins.legend.labels =
//             Chart.defaults.plugins.legend.labels || {};
//           Chart.defaults.plugins.legend.labels.color = colors.textColor;
//         }
//       }

//       // Update existing charts
//       if (Chart.instances) {
//         Object.values(Chart.instances).forEach((chart) => {
//           if (
//             chart.config &&
//             chart.config.options &&
//             chart.config.options.scales
//           ) {
//             Object.keys(chart.config.options.scales).forEach((scaleKey) => {
//               const scale = chart.config.options.scales[scaleKey];
//               if (scale.grid) scale.grid.color = colors.gridColor;
//               if (scale.ticks) scale.ticks.color = colors.textColor;
//             });
//           }
//           chart.update();
//         });
//       }
//     }
//   }

//   function handleThemeChange(button) {
//     document.querySelectorAll(".color-theme-btn").forEach((btn) => {
//       btn.classList.remove("active");
//       btn.style.outline = "none";
//     });

//     button.classList.add("active");
//     button.style.outline = "3px solid #5e35b1";
//     button.style.outlineOffset = "2px";

//     currentTheme = button.dataset.theme;
//     applyTheme(currentTheme, currentMode);
//   }

//   function handleModeChange(toggle) {
//     if (toggle.checked) {
//       document.documentElement.setAttribute("data-bs-theme", "dark");
//       document.getElementById("mode-label").textContent = "Dark";
//       currentMode = "dark";
//     } else {
//       document.documentElement.setAttribute("data-bs-theme", "light");
//       document.getElementById("mode-label").textContent = "Light";
//       currentMode = "light";
//     }

//     applyTheme(currentTheme, currentMode);
//   }

  // Font functions
//   function handleFontSizeChange(button) {
//     const target = button.dataset.target;
//     const action = button.dataset.action;
//     const slider = document.getElementById(`${target}-slider`);
//     const currentVal = parseInt(slider.value);
//     const newVal =
//       action === "increase"
//         ? Math.min(currentVal + 5, 150)
//         : Math.max(currentVal - 5, 70);

//     slider.value = newVal;
//     handleFontSliderChange(slider);
//   }

//   function handleFontSliderChange(slider) {
//     const target = slider.id.replace("-slider", "");
//     const value = slider.value;
//     const percentage = document.getElementById(`${target}-percentage`);

//     if (percentage) {
//       percentage.textContent = `${value}%`;
//     }

//     document.documentElement.style.setProperty(
//       `--${target}-scale`,
//       value / 100
//     );
//     localStorage.setItem(`phpmaker-font-${target}`, value);
//   }

//   function resetAllFonts() {
//     const tagTypes = ["body", "button", "input", "td"];
//     tagTypes.forEach((tag) => {
//       const slider = document.getElementById(`${tag}-slider`);
//       const percentage = document.getElementById(`${tag}-percentage`);

//       if (slider) slider.value = 100;
//       if (percentage) percentage.textContent = "100%";

//       document.documentElement.style.setProperty(`--${tag}-scale`, 1);
//       localStorage.removeItem(`phpmaker-font-${tag}`);
//     });
//   }

//   function loadSavedPreferences() {
//     // Load theme preferences
//     const savedTheme = localStorage.getItem("phpmaker-theme") || "blue";
//     const savedMode =
//       localStorage.getItem("phpmaker-mode") ||
//       (window.matchMedia &&
//       window.matchMedia("(prefers-color-scheme: dark)").matches
//         ? "dark"
//         : "light");

//     currentTheme = savedTheme;
//     currentMode = savedMode;

//     // Apply theme
//     applyTheme(savedTheme, savedMode);

//     // Update UI
//     const modeToggle = document.getElementById("theme-mode-toggle");
//     const modeLabel = document.getElementById("mode-label");

//     if (modeToggle && modeLabel) {
//       modeToggle.checked = savedMode === "dark";
//       modeLabel.textContent = savedMode === "dark" ? "Dark" : "Light";
//       document.documentElement.setAttribute("data-bs-theme", savedMode);
//     }

//     // Update theme button
//     const themeButton = document.querySelector(
//       `.color-theme-btn[data-theme="${savedTheme}"]`
//     );
//     if (themeButton) {
//       themeButton.classList.add("active");
//       themeButton.style.outline = "3px solid #5e35b1";
//       themeButton.style.outlineOffset = "2px";
//     }

//     // Load font preferences
//     const tagTypes = ["body", "button", "input", "td"];
//     tagTypes.forEach((tag) => {
//       const savedValue = localStorage.getItem(`phpmaker-font-${tag}`);
//       if (savedValue) {
//         const slider = document.getElementById(`${tag}-slider`);
//         const percentage = document.getElementById(`${tag}-percentage`);

//         if (slider) slider.value = savedValue;
//         if (percentage) percentage.textContent = `${savedValue}%`;

//         document.documentElement.style.setProperty(
//           `--${tag}-scale`,
//           savedValue / 100
//         );
//       }
//     });
//   }

  // Inject CSS once
//   function injectCSS() {
//     if (document.getElementById("phpmaker-styles")) return;

//     const style = document.createElement("style");
//     style.id = "phpmaker-styles";
//     style.textContent = `
//             :root {
//                 --body-scale: 1;
//                 --button-scale: 1;
//                 --input-scale: 1;
//                 --td-scale: 1;
//             }
            
//             body { font-size: calc(16px * var(--body-scale)) !important; }
//             button:not(.font-size-btn):not(#controls-toggle):not(#reset-all-fonts),
//             .btn { font-size: calc(1em * var(--button-scale)) !important; }
//             input, select, textarea { font-size: calc(1em * var(--input-scale)) !important; }
//             td, th { font-size: calc(1em * var(--td-scale)) !important; }
            
//             #theme-mode-toggle:checked + .slider {
//                 background-color: #5e35b1;
//             }
            
//             #theme-mode-toggle:checked + .slider span {
//                 transform: translateX(26px);
//             }
            
//             .color-theme-btn.active {
//                 outline: 3px solid #5e35b1 !important;
//                 outline-offset: 2px !important;
//             }
            
//             [data-bs-theme="dark"] .chartjs-legend li span,
//             [data-bs-theme="dark"] canvas + ul li span {
//                 color: #ffffff !important;
//             }
            
//             [data-bs-theme="light"] .chartjs-legend li span,
//             [data-bs-theme="light"] canvas + ul li span {
//                 color: #333333 !important;
//             }

//             /* Collapsible panel styles */
//             #controls-container {
//                 position: fixed;
//                 bottom: 20px;
//                 right: -350px;
//                 width: 320px;
//                 background: white;
//                 border-radius: 10px 0 0 10px;
//                 box-shadow: -4px 0 12px rgba(0,0,0,0.15);
//                 z-index: 1001;
//                 transition: right 0.3s ease;
//                 padding: 20px;
//                 max-height: 80vh;
//                 overflow-y: auto;
//             }

//             #controls-container.expanded {
//                 right: 0;
//             }

//             #controls-toggle {
//                 position: fixed;
//                 bottom: 50px;
//                 right: 0;
//                 width: 40px;
//                 height: 50px;
//                 background: #49bbd8ff;
//                 color: white;
//                 border: none;
//                 border-radius: 10px 0 0 10px;
//                 box-shadow: -4px 0 12px rgba(0,0,0,0.15);
//                 z-index: 1002;
//                 cursor: pointer;
//                 display: flex;
//                 align-items: center;
//                 justify-content: center;
//                 transition: all 0.3s ease;
//             }


//             #controls-toggle.expanded {
//                 right: 320px;
//             }

//             #controls-toggle svg {
//                 transition: transform 0.3s ease;
//             }

//             #controls-toggle.expanded svg {
//                 transform: rotate(180deg);
//             }

//             [data-bs-theme="dark"] #controls-container {
//                 background: #2c2c2c;
//                 color: white;
//             }

//             .controls-section {
//                 margin-bottom: 25px;
//                 padding-bottom: 20px;
//                 border-bottom: 1px solid #e0e0e0;
//             }

//             [data-bs-theme="dark"] .controls-section {
//                 border-bottom-color: #444;
//             }

//             .controls-section:last-child {
//                 border-bottom: none;
//             }

//             .controls-section h4 {
//                 margin-top: 0;
//                 margin-bottom: 15px;
//                 font-size: 16px;
//                 font-weight: bold;
//             }

//             [data-bs-theme="dark"] .font-size-btn {
//                 background: #444 !important;
//                 color: white;
//             }
//         `;

//     document.head.appendChild(style);
//   }

  // Initialize everything
  function initialize() {
    // injectCSS();

    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", handleWindowLoad);
    } else {
      handleWindowLoad();
    }
  }

  // Start initialization
  initialize();
})();