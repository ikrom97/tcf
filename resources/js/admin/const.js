export const AdminRoute = {
  HOME: '/',
  ADMIN: '/admin',
  TOURNAMENTS: '/admin/tournaments',
  TOURNAMENTS_SINGLE: '/admin/tournaments/:id',
  NEWS: '/admin/news',
  NEWS_SINGLE: '/admin/news/:id',
  ARTICLES: '/admin/articles',
  ARTICLES_SINGLE: '/admin/articles/:id',
};

export const APIRoute = {
  TOURNAMENTS: '/api/tournaments',
  TOURNAMENTS_SINGLE: '/api/tournaments/:id',
  TOURNAMENTS_UPDATE: '/api/tournaments/update',
  TOURNAMENTS_DELETE: '/api/tournaments/delete',

  NEWS: '/api/news',
  NEWS_SINGLE: '/api/news/:id',
  NEWS_UPDATE: '/api/news/update',
  NEWS_DELETE: '/api/news/delete',
};

export const dataGridLocalText = {
  noRowsLabel: 'Нет рядов',
  noResultsOverlayLabel: 'Результатов не найдено.',

  toolbarDensity: 'Плотность',
  toolbarDensityLabel: 'Плотность',
  toolbarDensityCompact: 'Компакт',
  toolbarDensityStandard: 'Стандарт',
  toolbarDensityComfortable: 'Комфортный',

  toolbarColumns: 'Колонны',
  toolbarColumnsLabel: 'Выберите столбцы',

  toolbarFilters: 'Фильтры',
  toolbarFiltersLabel: 'Показать фильтры',
  toolbarFiltersTooltipHide: 'Скрыть фильтры',
  toolbarFiltersTooltipShow: 'Показать фильтры',
  toolbarFiltersTooltipActive: (count) =>
    count !== 1 ? `${count} активные фильтры` : `${count} активные фильтры`,

  toolbarQuickFilterPlaceholder: 'Поиск…',
  toolbarQuickFilterLabel: 'Поиск',
  toolbarQuickFilterDeleteIconLabel: 'Очистить',

  toolbarExport: 'Экспорт',
  toolbarExportLabel: 'Экспорт',
  toolbarExportCSV: 'Скачать как CSV',
  toolbarExportPrint: 'Распечатать',
  toolbarExportExcel: 'Скачать как Excel',

  columnsPanelTextFieldLabel: 'Найти столбец',
  columnsPanelTextFieldPlaceholder: 'Заголовок столбца',
  columnsPanelDragIconLabel: 'Переупорядочение столбца',
  columnsPanelShowAllButton: 'Показать все',
  columnsPanelHideAllButton: 'Скрыть все',

  filterPanelAddFilter: 'Добавить фильтер',
  filterPanelDeleteIconLabel: 'Удалить',
  filterPanelLogicOperator: 'Логические операторы',
  filterPanelOperator: 'Оператор',
  filterPanelOperatorAnd: 'И',
  filterPanelOperatorOr: 'Или',
  filterPanelColumns: 'Столбцы',
  filterPanelInputLabel: 'Значение',
  filterPanelInputPlaceholder: 'Значение фильтра',

  filterOperatorContains: 'содержит',
  filterOperatorEquals: 'равно',
  filterOperatorStartsWith: 'начинается с',
  filterOperatorEndsWith: 'заканчивается',
  filterOperatorIs: 'является',
  filterOperatorNot: 'не является',
  filterOperatorAfter: 'после',
  filterOperatorOnOrAfter: 'на или после',
  filterOperatorBefore: 'раньше',
  filterOperatorOnOrBefore: 'на или ранее',
  filterOperatorIsEmpty: 'пусто',
  filterOperatorIsNotEmpty: 'не пуст',
  filterOperatorIsAnyOf: 'любой',

  filterValueAny: 'любой',
  filterValueTrue: 'истинный',
  filterValueFalse: 'ложь',

  columnMenuLabel: 'Меню',
  columnMenuShowColumns: 'Показать столбцы',
  columnMenuManageColumns: 'Управление столбцами',
  columnMenuFilter: 'Фильтр',
  columnMenuHideColumn: 'Скрыть столбец',
  columnMenuUnsort: 'Убрать сортировку',
  columnMenuSortAsc: 'Сортировать, восходящая',
  columnMenuSortDesc: 'Сортировать, спустившись',

  columnHeaderFiltersTooltipActive: (count) =>
    count !== 1 ? `${count} активные фильтры` : `${count} активные фильтры`,
  columnHeaderFiltersLabel: 'Показать фильтры',
  columnHeaderSortIconLabel: 'Сортировать',

  footerRowSelected: (count) =>
    count !== 1
      ? `${count.toLocaleString()} ряды выбраны`
      : `${count.toLocaleString()} выбран строка`,

  footerTotalRows: 'Общие ряды:',

  footerTotalVisibleRows: (visibleCount, totalCount) =>
    `${visibleCount.toLocaleString()} из ${totalCount.toLocaleString()}`,

  checkboxSelectionHeaderName: 'Выбор флажки',
  checkboxSelectionSelectAllRows: 'Выберите все ряды',
  checkboxSelectionUnselectAllRows: 'Невыполнить все ряды',
  checkboxSelectionSelectRow: 'Выберите строку',
  checkboxSelectionUnselectRow: 'Невыразированный ряд',

  booleanCellTrueLabel: 'да',
  booleanCellFalseLabel: 'нет',

  actionsCellMore: 'ещё',

  pinToLeft: 'Булавка слева',
  pinToRight: 'Приколоть справа',
  unpin: 'Не',

  treeDataGroupingHeaderName: 'Группа',
  treeDataExpand: 'смотрите детей',
  treeDataCollapse: 'скрыть детей',

  groupingColumnHeaderName: 'Группа',
  groupColumn: (name) => `Группа по ${name}`,
  unGroupColumn: (name) => `Прекратите группировать ${name}`,

  detailPanelToggle: 'Подробная панель переключать',
  expandDetailPanel: 'Расширять',
  collapseDetailPanel: 'Крах',

  MuiTablePagination: {},

  rowReorderingHeaderName: 'Переупорядочение ряда',

  aggregationMenuItemHeader: 'Агрегация',
  aggregationFunctionLabelSum: 'сумма',
  aggregationFunctionLabelAvg: 'средний',
  aggregationFunctionLabelMin: 'мин',
  aggregationFunctionLabelMax: 'макс',
  aggregationFunctionLabelSize: 'размер',
};
