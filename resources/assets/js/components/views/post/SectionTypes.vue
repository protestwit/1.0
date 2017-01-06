<script type="text/javascript">
    export default
        [
            {
                label: 'Company',
                map: 'company',
                fields: [
                    {
                        map: 'name',
                        label: 'name',
                        inputType: 'text',
                        placeholder: 'Company Name',
                        value: '',
                    },
                    {
                        map: 'name',
                        label: 'symbol',
                        inputType: 'text',
                        placeholder: 'stock symbol',
                        value: '',
                    }
                ]

            },
            {
                label: 'Link',
                map: 'link',
                inputType: 'text',
                data: {},
                fields: [
                    {
                        label: 'url',
                        name: 'url',
                        inputType: 'text',
                        placeholder: 'Url',
                    },
                ]

            },
            {
                label: 'Paragraph',
                map: 'paragraph',
                fields: [
                    {
                        label: 'content',
                        name: 'content',
                        inputType: 'text-area',
                        placeholder: 'Content',
                        value: '',
                    },
                ]
            },

            {
                label: 'Person',
                map: 'person',
                data: {},
                inputType: 'data-map',

                'fields': [
                    {
                        label: 'first_name',
                        name: 'name',
                        placeholder: 'Person Name',
                        data: {
                            content: '',
                        },
                    },
                    {
                        label: 'last_name',
                        name: 'name',
                        placeholder: 'Person Name',
                    }
                ]

            },
        ]

    </script>