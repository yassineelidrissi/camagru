<?php
# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Field.php                                          :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: magoumi <agoumi.mohamed@outlook.com>       +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2021/03/21 14:31:09 by magoumi           #+#    #+#              #
#    Updated: 2021/03/21 14:31:09 by magoumi          ###   ########lyon.fr    #
#                                                                              #
# **************************************************************************** #

namespace core\Form;


use models\Model;

class Field
{
	public const TYPE_TEXT = 'text';
	public const TYPE_EMAIL = 'email';
	public const TYPE_PASSWORD = 'password';
	public const TYPE_HIDDEN = 'hidden';
	public const DISABLED = 'disabled="disabled"';
	public const REQUIRED = 'required="required"';
	
	public Model $model;
	public string $attribute;
	public string $label;
	public string $type;
	public string $holder;
	public string $disabled;
	public string $required;
	public string $default;

	public function __construct(Model $model, string $attribute, string $label)
	{
		$this->model = $model;
		$this->attribute = $attribute;
		$this->label = $label;
		$this->type = self::TYPE_TEXT;
		$this->disabled = '';
		$this->required = '';
		$this->default = '';
	}


    /** magic method to convert from object to string
     * check php docs for in depth explanation
     * @return string
     */
    public function __toString(): string
    {
    	if ($this->type != self::TYPE_HIDDEN) {
		    return sprintf('
			<div class="row">
				<div class="col-25">
					<label for="%s">%s</label>
				</div>
				<div class="col-75">
					<input type="%s" class="%s" id="%s" name="%s" value="%s" placeholder="%s" %s %s>
					<div class="invalid-feedback">
						%s
					</div>
				</div>
			</div>
			', $this->attribute
			    , !empty($this->label) ? $this->label : ucfirst($this->attribute)
			    , $this->type
			    , $this->model->hasError($this->attribute) ? 'is-invalid' : ''
			    , $this->attribute
			    , $this->attribute
			    , $this->model->{$this->attribute}
			    , !empty($this->holder) ? $this->holder : $this->attribute
			    , $this->disabled
			    , $this->required
			    , $this->model->getFirstError($this->attribute)
		    );
	    }
    	return sprintf('
			<div class="row">
				<div class="col-25">
				</div>
				<div class="col-75">
					<input type="%s" class="%s" id="%s" name="%s" value="%s" placeholder="%s" %s %s>
					<div class="invalid-feedback">
						%s
					</div>
				</div>
			</div>
			'
		    , $this->type
		    , $this->model->hasError($this->attribute) ? 'is-invalid' : ''
		    , $this->attribute
		    , $this->attribute
		    , $this->model->{$this->attribute}
		    , !empty($this->holder) ? $this->holder : $this->attribute
		    , $this->disabled
		    , $this->required
		    , $this->model->getFirstError($this->attribute)
	    );
	}

    /**
     * set the field type to password
     * @return $this
     */
	public function passwordField(): Field
    {
		$this->type = self::TYPE_PASSWORD;
		
		return $this;
	}

    /**
     * set the field type to email
     * @return $this
     */
	public function emailField(): Field
    {
		$this->type = self::TYPE_EMAIL;

		return $this;
	}

    /**
     * make the field disabled
     * @return $this
     */
	public function disabled(): Field
    {
		$this->disabled = self::DISABLED;

		return $this;
	}

    /**
     * make the field required
     * @return $this
     */
	public function required(): Field
    {
		$this->required = self::REQUIRED;

		return $this;
	}


    /**
     * give a default value to the field
     * @param string $default
     * @return $this
     */
	public function default(string $default): Field
    {
		if (!$this->model->{$this->attribute})
			$this->model->{$this->attribute} = $default;

		return $this;
	}
	
	/**
	 * @param string $string
	 * @return $this
	 */
	public function setHolder(string $string): Field
    {
        $this->holder = $string;

        return $this;
    }

	public function hiddentField(): Field
	{
		$this->type = self::TYPE_HIDDEN;

		return $this;
	}
}