<?php

return [
    'actions' => [
        'attach' => 'Прикрепить',
        'attach_and_attach_another' => 'Прикрепить и добавить еще',
        'bulk_actions' => 'Массовые действия',
        'cancel' => 'Отменить',
        'create' => 'Создать',
        'create_and_create_another' => 'Создать и добавить еще',
        'delete' => 'Удалить',
        'delete_selected' => 'Удалить выбранные',
        'detach' => 'Открепить',
        'detach_selected' => 'Открепить выбранные',
        'edit' => 'Редактировать',
        'export' => 'Экспорт',
        'force_delete' => 'Принудительно удалить',
        'force_delete_selected' => 'Принудительно удалить выбранные',
        'import' => 'Импорт',
        'restore' => 'Восстановить',
        'restore_selected' => 'Восстановить выбранные',
        'save' => 'Сохранить',
        'save_changes' => 'Сохранить изменения',
        'view' => 'Просмотр',
    ],

    'components' => [
        'pagination' => [
            'go_to_page' => 'Перейти на страницу :page',
            'next' => 'Далее',
            'previous' => 'Назад',
            'first' => 'Первая',
            'last' => 'Последняя',
        ],

        'search_field' => [
            'placeholder' => 'Поиск...',
        ],

        'table' => [
            'actions' => [
                'toggle_columns' => 'Переключить колонки',
            ],
            'empty' => [
                'heading' => 'Записи не найдены',
                'description' => 'Создайте новую запись, чтобы начать.',
            ],
            'filters' => [
                'actions' => [
                    'remove' => 'Удалить фильтр',
                    'remove_all' => 'Удалить все фильтры',
                    'reset' => 'Сбросить',
                ],
                'heading' => 'Фильтры',
                'indicator' => 'Активные фильтры',
                'multi_select' => [
                    'placeholder' => 'Все',
                ],
                'select' => [
                    'placeholder' => 'Все',
                ],
                'trashed' => [
                    'label' => 'Удаленные записи',
                    'only_trashed' => 'Только удаленные записи',
                    'with_trashed' => 'С удаленными записями',
                    'without_trashed' => 'Без удаленных записей',
                ],
            ],
            'loading' => 'Загрузка...',
            'pagination' => [
                'label' => 'Навигация по страницам',
                'overview' => 'Показано :first до :last из :total результатов',
                'pages' => [
                    'next' => [
                        'label' => 'Следующая страница',
                    ],
                    'previous' => [
                        'label' => 'Предыдущая страница',
                    ],
                ],
                'per_page' => [
                    'label' => 'по',
                    'options' => [
                        'all' => 'Все',
                    ],
                ],
            ],
            'search' => [
                'label' => 'Поиск',
                'placeholder' => 'Поиск',
                'indicator' => 'Поиск',
            ],
            'selection' => [
                'label' => 'Выбрать/снять выбор всех записей',
                'bulk_actions' => [
                    'label' => 'Выбрано записей: :count',
                ],
            ],
            'sorting' => [
                'asc' => 'Сортировать по возрастанию',
                'desc' => 'Сортировать по убыванию',
            ],
        ],
    ],

    'forms' => [
        'are_you_sure' => 'Вы уверены?',

        'components' => [
            'builder' => [
                'actions' => [
                    'add' => 'Добавить :label',
                    'add_between' => 'Добавить между блоками',
                    'delete' => 'Удалить',
                    'move_down' => 'Переместить вниз',
                    'move_up' => 'Переместить вверх',
                    'reorder' => 'Изменить порядок',
                ],
                'collapsed' => 'Содержимое свернуто',
                'collapsible' => 'Сворачиваемый',
            ],

            'file_upload' => [
                'editor' => [
                    'actions' => [
                        'cancel' => 'Отменить',
                        'drag_crop' => 'Режим перетаскивания "обрезка"',
                        'drag_move' => 'Режим перетаскивания "перемещение"',
                        'flip_horizontal' => 'Отразить изображение по горизонтали',
                        'flip_vertical' => 'Отразить изображение по вертикали',
                        'move_down' => 'Переместить изображение вниз',
                        'move_left' => 'Переместить изображение влево',
                        'move_right' => 'Переместить изображение вправо',
                        'move_up' => 'Переместить изображение вверх',
                        'reset' => 'Сбросить',
                        'rotate_ccw' => 'Повернуть изображение против часовой стрелки',
                        'rotate_cw' => 'Повернуть изображение по часовой стрелке',
                        'save' => 'Сохранить',
                        'zoom_100' => 'Масштабировать изображение до 100%',
                        'zoom_in' => 'Увеличить',
                        'zoom_out' => 'Уменьшить',
                    ],
                ],
                'loading' => 'Загрузка...',
            ],

            'key_value' => [
                'actions' => [
                    'add' => 'Добавить строку',
                    'delete' => 'Удалить строку',
                    'reorder' => 'Изменить порядок строк',
                ],
                'fields' => [
                    'key' => 'Ключ',
                    'value' => 'Значение',
                ],
            ],

            'markdown_editor' => [
                'toolbar_buttons' => [
                    'attach_files' => 'Прикрепить файлы',
                    'blockquote' => 'Цитата',
                    'bold' => 'Жирный',
                    'bullet_list' => 'Маркированный список',
                    'code_block' => 'Блок кода',
                    'heading' => 'Заголовок',
                    'italic' => 'Курсив',
                    'link' => 'Ссылка',
                    'ordered_list' => 'Нумерованный список',
                    'redo' => 'Повторить',
                    'strike' => 'Зачеркнутый',
                    'table' => 'Таблица',
                    'undo' => 'Отменить',
                ],
            ],

            'repeater' => [
                'actions' => [
                    'add' => 'Добавить :label',
                    'add_between' => 'Добавить между',
                    'delete' => 'Удалить',
                    'move_down' => 'Переместить вниз',
                    'move_up' => 'Переместить вверх',
                    'reorder' => 'Изменить порядок',
                ],
                'collapsed' => 'Содержимое свернуто',
                'collapsible' => 'Сворачиваемый',
            ],

            'rich_editor' => [
                'dialogs' => [
                    'link' => [
                        'actions' => [
                            'link' => 'Ссылка',
                            'unlink' => 'Удалить ссылку',
                        ],
                        'label' => 'URL',
                        'placeholder' => 'Введите URL',
                    ],
                ],
                'toolbar_buttons' => [
                    'attach_files' => 'Прикрепить файлы',
                    'blockquote' => 'Цитата',
                    'bold' => 'Жирный',
                    'bullet_list' => 'Маркированный список',
                    'code_block' => 'Блок кода',
                    'h1' => 'Заголовок',
                    'h2' => 'Заголовок',
                    'h3' => 'Подзаголовок',
                    'italic' => 'Курсив',
                    'link' => 'Ссылка',
                    'ordered_list' => 'Нумерованный список',
                    'redo' => 'Повторить',
                    'strike' => 'Зачеркнутый',
                    'underline' => 'Подчеркнутый',
                    'undo' => 'Отменить',
                ],
            ],

            'select' => [
                'actions' => [
                    'create_option' => [
                        'modal' => [
                            'heading' => 'Создать',
                            'actions' => [
                                'create' => 'Создать',
                                'create_another' => 'Создать и добавить еще',
                            ],
                        ],
                    ],
                ],
                'boolean' => [
                    'true' => 'Да',
                    'false' => 'Нет',
                ],
                'loading_message' => 'Загрузка...',
                'max_items_message' => 'Можно выбрать только :count элементов.',
                'no_search_results_message' => 'Нет результатов поиска.',
                'placeholder' => 'Выберите вариант',
                'searching_message' => 'Поиск...',
                'search_prompt' => 'Начните вводить для поиска...',
            ],

            'tags_input' => [
                'placeholder' => 'Новый тег',
            ],

            'text_input' => [
                'actions' => [
                    'hide_password' => 'Скрыть пароль',
                    'show_password' => 'Показать пароль',
                ],
            ],

            'toggle' => [
                'boolean' => [
                    'true' => 'Да',
                    'false' => 'Нет',
                ],
            ],

            'wizard' => [
                'actions' => [
                    'previous_step' => 'Назад',
                    'next_step' => 'Далее',
                ],
            ],
        ],
    ],

    'navigation' => [
        'keymap' => [
            'close_sidebar' => 'Закрыть боковую панель',
            'open_sidebar' => 'Открыть боковую панель',
            'sidebar' => 'Боковая панель',
        ],
    ],

    'pages' => [
        'health_check' => [
            'buttons' => [
                'refresh' => 'Обновить',
            ],

            'heading' => 'Проверка состояния',

            'issues' => [
                'description' => 'Некоторые проверки состояния не прошли. Для получения дополнительной информации обратитесь к системному администратору.',
                'summary' => 'Найдены проблемы',
            ],

            'success' => 'Проверки состояния прошли успешно.',

            'results' => [
                'failed' => 'Неудачно',
                'pending' => 'Ожидание',
                'success' => 'Успешно',
            ],
        ],
    ],

    'widgets' => [
        'account' => [
            'heading' => 'Добро пожаловать, :name',
        ],

        'filament_info' => [
            'actions' => [
                'open' => 'Открыть',
            ],
            'description' => 'Filament — это коллекция красивых полнофункциональных PHP-компонентов для быстрого создания интерфейсов TALL приложений.',
            'heading' => 'Добро пожаловать в Filament',
        ],
    ],
];