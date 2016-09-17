<?php

/**
 * TODO @nicolasluishuber: Melhorar os componentes principalmente com máscara
 * Laravel Collective Custom components
 * @see https://laravelcollective.com/docs/5.2/html#custom-components
 */


/**
 * TextBox
 */
Form::component('textBox', 'layouts/components/form/textbox', ['name', 'value' => null, 'label' => null, 'attributes' => []]);

/**
 * E-mail
 */
Form::component('myEmail', 'layouts/components/form/email', ['name', 'value' => null, 'label' => 'E-mail', 'attributes' => []]);


/**
 * Numeric
 */
Form::component('numeric', 'layouts/components/form/numeric', ['name', 'value' => null, 'label' => null, 'attributes' => []]);

/**
 * TextArea
 */
Form::component('myTextArea', 'layouts/components/form/textarea', ['name', 'value' => null, 'label' => null, 'attributes' => []]);

/**
 * CPF
 */
Form::component('cpf', 'layouts/components/form/cpf', ['name', 'value' => null, 'label' => 'CPF', 'attributes' => []]);

/**
 * CEP
 */
Form::component('cep', 'layouts/components/form/cep', ['name', 'value' => null, 'label' => 'CEP', 'attributes' => []]);

/**
 * CEP
 */
Form::component('phone', 'layouts/components/form/phone', ['name', 'value' => null, 'label' => 'Telefone', 'attributes' => []]);


/**
 * TextBox with addon (icon)
 */
Form::component('textBoxAddon', 'layouts/components/form/textbox-addon', ['name', 'value' => null, 'icon', 'label' => null, 'attributes' => []]);

/**
 * TextBox with addon (text)
 */
Form::component('textBoxAddonText', 'layouts/components/form/textbox-addon-text', ['name', 'value' => null, 'text', 'label' => null, 'attributes' => []]);


/**
 * Password with addon (icon)
 */
Form::component('passwordAddon', 'layouts/components/form/password-addon', ['name', 'label' => null, 'attributes' => []]);

/**
 * Email with addon (icon)
 */
Form::component('emailAddon', 'layouts/components/form/email-addon', ['name', 'value' => null, 'label' => null, 'attributes' => []]);

/**
 * RadioBox
 */
Form::component('myRadio', 'layouts/components/form/radio', ['name', 'value', 'text', 'checked' => 0, 'attributes' => []]);

/**
 * CheckBox
 */
Form::component('myCheckbox', 'layouts/components/form/checkbox', ['name', 'value', 'text', 'checked' => 0, 'attributes' => []]);

/**
 * Input Date
 */
Form::component('inputDate', 'layouts/components/form/date', ['name', 'value', 'label', 'attributes' => []]);

/**
 * Combobox
 */
Form::component('combobox', 'layouts/components/form/combobox', ['name', 'list', 'selected' => null, 'label', 'attributes' => []]);

/**
 * Submit button
 */
Form::component('mySubmit', 'layouts/components/form/submit', ['value', 'attributes' => []]);

/**
 * Pool
 */
Form::component('pool', 'layouts/components/form/pool', ['idTipoPool', 'nome', 'automatico']);
